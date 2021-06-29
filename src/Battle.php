<?php


namespace BattleSystem;


use BattleSystem\Units\UnitInterface;

class Battle implements BattleInterface
{
    const ATTACK_MODIFICATIONS_MAX = 0.2;
    const ATTACK_MODIFICATIONS_MIN = 0.2;

    private int $roundNumber = 1;

    /**
     * @var Round[] array
     */
    private array $rounds = [];

    /**
     * @inheritDoc
     */
    public function attack(UnitInterface $attacker, UnitInterface $defender): void
    {
        $round = new Round($this->roundNumber);
        $round->setAttackerBefore(clone $attacker);
        $round->setDefenderBefore(clone $defender);

        $defenderHealth = $defender->getHealth();
        $damage = $this->calculateAttack($attacker, $defender);

        $round->setDamage($damage);
        $round->setReply(false);
        $defender->setHealth($defenderHealth - $damage);

        $round->setAttackerAfter(clone $attacker);
        $round->setDefenderAfter(clone $defender);

        $this->rounds[] = $round;
        $this->roundNumber++;


        if(!$defender->isDestroyed()) {
            $round = new Round($this->roundNumber);
            $attackerHealth = $attacker->getHealth();

            $round->setAttackerBefore(clone $defender);
            $round->setDefenderBefore(clone $attacker);

            $damage = $this->calculateAttack($defender, $attacker);
            $round->setDamage($damage);
            $attacker->setHealth($attackerHealth - $damage);

            $round->setAttackerAfter(clone $attacker);
            $round->setDefenderAfter(clone $defender);

            $round->setReply(true);
            $this->rounds[] = $round;
            $this->roundNumber++;
        }
    }

    private function calculateAttack(UnitInterface $a, UnitInterface $d): int
    {
        $baseAttack = $a->getAttack();
        $baseAttack = mt_rand($baseAttack-($baseAttack*self::ATTACK_MODIFICATIONS_MIN),$baseAttack+($baseAttack*self::ATTACK_MODIFICATIONS_MAX));

        $baseDefense = $d->getDefense();
        if($baseAttack <= $baseDefense) {
            return 1;
        }

        return $baseAttack - $baseDefense;
    }

    public function getRounds(): array
    {
        return $this->rounds;
    }
}