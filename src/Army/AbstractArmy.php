<?php


namespace BattleSystem\Army;

use BattleSystem\NameTrait;
use BattleSystem\Units\UnitInterface;

class AbstractArmy implements ArmyInterface
{

    use NameTrait;
    /**
     * @var UnitInterface[]
     */
    protected array $units;

    public function __construct(string $name = "", array $units = [])
    {
        $this->units = $units;
        $this->setName($name);
    }

    public function addUnit(UnitInterface $unit) {
        $this->units[] = $unit;
    }

    public function removeUnit(UnitInterface $unit) {
        foreach ($this->units as $k => $u) {
            if($u === $unit){
                unset($this->units[$k]);
            }
        }
    }

    public function takeUnit() {
        $unit = null;
        if($this->key($this->units) !== null) {
            $unit = $this->current($this->units);
            $this->next($this->units);
        }
        return $unit;
    }

    public function resupply(): ArmyInterface {
        foreach ($this->units as $unit) {
            $unit->recalculateAttributes();
        }
        return $this;
    }
    
    public function haveNotDestroyedUnits(): bool {
        foreach ($this->units as $unit) {
            if(!$unit->isDestroyed()) {
                return true;
            }
        }
        return false;
    }

    public function rewind(): void {
        $this->reset($this->units);
    }

    public function key(array $array) {
        return key($array);
    }

    private function current(array $array) {
        return current($array);
    }

    private function next(array $array) {
        next($array);
    }

    private function reset(array $array) {
        reset($array);
    }
}