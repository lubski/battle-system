<?php


namespace BattleSystem\Items;


use BattleSystem\Units\UnitInterface;

class Shield implements ItemsInterface
{

    protected int $defense = 30;
    /**
     * @inheritDoc
     */
    public function modify(UnitInterface $unit): void
    {
        $unit->setDefense($unit->getDefense()+$this->defense);
    }
}