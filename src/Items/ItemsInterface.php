<?php


namespace BattleSystem\Items;


use BattleSystem\Units\UnitInterface;

interface ItemsInterface
{
    /**
     * Units are equipped with item (swords, bow etc.)
     * Items modified units attack power, defense etc.
     *
     * @param UnitInterface $unit
     */
    public function modify(UnitInterface $unit): void;
}