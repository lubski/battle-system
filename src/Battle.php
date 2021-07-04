<?php


namespace BattleSystem;


use BattleSystem\Units\UnitInterface;

class Battle implements BattleInterface
{
    const ATTACK_MODIFICATIONS_MAX = 0.2;
    const ATTACK_MODIFICATIONS_MIN = 0.2;
    
    /**
     * @inheritDoc
     */
    public function attack(UnitInterface $attacker, UnitInterface $defender, RoundInterface $round): void
    {
        $round->setDefenderBefore(clone $defender);
        $round->setAttackerBefore(clone $attacker);
        $defenderHealth = $defender->getHealth();
        $damage = $this->calculateAttack($attacker, $defender);
        $round->setDamageAttacker($damage);
        $defender->setHealth($defenderHealth - $damage);

        $attackerHealth = $attacker->getHealth();
        $damage = $this->calculateAttack($defender, $attacker);
        $round->setDamageDefender($damage);
        $attacker->setHealth($attackerHealth - $damage);

        $round->setDefenderAfter(clone $defender);
        $round->setAttackerAfter(clone $attacker);
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
}