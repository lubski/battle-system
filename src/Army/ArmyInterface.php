<?php


namespace BattleSystem\Army;

use BattleSystem\Units\UnitInterface;

interface ArmyInterface
{

    public function addUnit(UnitInterface $unit);

    public function removeUnit(UnitInterface $unit);

    public function takeUnit();

    public function resupply(): ArmyInterface;

    public function haveNotDestroyedUnits(): bool;

    public function getName(): string;

    public function rewind(): void;
}