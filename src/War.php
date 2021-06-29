<?php


namespace BattleSystem;


use BattleSystem\Items\Round;

class War implements WarInterface
{
    private ArmyAbstract $army1;
    private ArmyAbstract $army2;
    private BattleInterface $battleSystem;

    /**
     * @var Round[] array
     */
    private array $rounds;

    public function __construct(ArmyAbstract $army1, ArmyAbstract $army2, BattleInterface $battleSystem)
    {
        $this->army1 = $army1;
        $this->army2 = $army2;
        $this->battleSystem = $battleSystem;
    }

    public function warIsOver() {
        return ($this->army1->haveNotDestroyedUnits() === false || $this->army2->haveNotDestroyedUnits() === false) ? true : false;
    }

    public function skirmish(\Closure $callback = null) {
        $unit1 = $this->army1->takeUnit();
        $unit2 = $this->army2->takeUnit();

        while (!$this->warIsOver()) {
            $this->battleSystem->attack($unit1, $unit2);
            if($unit1->isDestroyed()) {
                unset($unit1);
                $unit1 = $this->army1->takeUnit();
            }

            if($unit2->isDestroyed()) {
                unset($unit2);
                $unit2 = $this->army2->takeUnit();
            }
        }
    }

    public function getWinner(): ArmyAbstract
    {
        if($this->warIsOver()) {
            if($this->army1->haveNotDestroyedUnits()) {
                return $this->army1;
            }

            if($this->army2->haveNotDestroyedUnits()) {
                return $this->army2;
            }
        }
    }
}