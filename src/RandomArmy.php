<?php


namespace BattleSystem;


use BattleSystem\Items\AvailableItemsInterface;
use BattleSystem\Units\AvailableUnitsInterface;

class RandomArmy extends Army\AbstractArmy
{
    private int $minUnits;
    private int $maxUnits;
    private int $minItems;
    private int $maxItems;

    public function __construct(string $name = "", array $units = [], int $minUnits = 10, int $maxUnits = 100, int $minItems = 0, int $maxItems = 4)
    {
        parent::__construct($name, $units);
        $this->minUnits = $minUnits;
        $this->maxUnits = $maxUnits;
        $this->minItems = $minItems;
        $this->maxItems = $maxItems;
        $this->getRandUnits();
    }

    private function getRandUnits() {
        $units = mt_rand($this->minUnits, $this->maxUnits);
        for($i =0; $i < $units; $i++) {
            $unitClass = AvailableUnitsInterface::AVAILABLEUNITS[mt_rand(0, count(AvailableUnitsInterface::AVAILABLEUNITS)-1)];
            $this->addUnit(new $unitClass("Unit ".$i,$this->getRandItems()));
        }
    }

    private function getRandItems(): array {
        $items = mt_rand($this->minItems, $this->maxItems);
        $itemsCollection = [];
        for($i =0; $i < $items; $i++) {
            $itemClass = AvailableItemsInterface::AVAILABLEITEMS[mt_rand(0, count(AvailableUnitsInterface::AVAILABLEUNITS)-1)];
            $itemsCollection[] = new $itemClass();
        }

        return $itemsCollection;
    }
}