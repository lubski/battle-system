<?php


namespace BattleSystem;

use BattleSystem\Army\ArmyInterface;
use BattleSystem\Units\UnitInterface;

class War implements WarInterface
{
    private ArmyInterface $army1;
    private ArmyInterface $army2;
    private BattleInterface $battle;

    public function __construct(ArmyInterface $army1, ArmyInterface $army2, BattleInterface $battle)
    {
        $this->army1 = $army1;
        $this->army2 = $army2;
        $this->battle = $battle;
    }

    public function warIsOver():bool {
        return ($this->army1->haveNotDestroyedUnits() === false || $this->army2->haveNotDestroyedUnits() === false) ? true : false;
    }

    /**
     * @return ArmyInterface|null
     */
    public function getWinner(): ?ArmyInterface
    {
        if($this->warIsOver()) {
            if($this->army1->haveNotDestroyedUnits()) {
                return $this->army1;
            }

            if($this->army2->haveNotDestroyedUnits()) {
                return $this->army2;
            }
        }

        return null;
    }

    public function getArmy(int $number): ArmyInterface
    {
        if($number == 1) {
            return $this->army1;
        } elseif ($number == 2) {
            return $this->army2;
        }

        throw new \InvalidArgumentException("Wrong army number");
    }

    public function begin(callable $closure = null) {
        if($closure) {
            foreach ($this->calculateFight() as $round) {
                $closure($round);
            }
        } else {
            return $this->calculateFight();
        }
    }

    private function calculateFight() {
        $unit1 = $this->getArmy(1)->takeUnit();
        $unit2 = $this->getArmy(2)->takeUnit();

        $i=1;
        while(!$this->warIsOver()) {
            $round = new Round($i);
            if ($unit1 instanceof UnitInterface && $unit1->isDestroyed()) {
                $unit1 = $this->getArmy(1)->takeUnit();
            }
            if ($unit2 instanceof UnitInterface && $unit2->isDestroyed()) {
                $unit2 = $this->getArmy(2)->takeUnit();
            }
            if($unit1 && $unit2) {
                $this->battle->attack($unit1, $unit2, $round);
                yield $round;
                $i++;
            }
        }
    }

    public function resupplyArmies(): void
    {
        $this->getArmy(1)->resupply()->rewind();
        $this->getArmy(2)->resupply()->rewind();
    }
}