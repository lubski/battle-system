<?php


namespace BattleSystem\Items;

use BattleSystem\Units\UnitInterface;

class Sword implements ItemsInterface
{
    protected int $attack = 25;
    /**
     * @inheritDoc
     */
    public function modify(UnitInterface $unit): void
    {
        $unit->setAttack($unit->getAttack() + $this->attack);
    }
}