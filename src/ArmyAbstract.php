<?php


namespace BattleSystem;


use BattleSystem\Units\UnitInterface;
use Countable;
use Iterator;

class ArmyAbstract implements Iterator, Countable
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
        if($this->valid()) {
            $unit = $this->units[key($this->units)];
            $this->next();
        }

        return $unit;
    }
    
    public function haveNotDestroyedUnits(): bool {
        foreach ($this->units as $unit) {
            if(!$unit->isDestroyed()) {
                return true;
            }
        }
        return false;
    }

    function rewind() {
        return reset($this->units);
    }
    function current() {
        return current($this->units);
    }
    function key() {
        return key($this->units);
    }
    function next() {
        return next($this->units);
    }
    function valid() {
        return key($this->units) !== null;
    }

    public function count():int
    {
        return count($this->units);
    }
}