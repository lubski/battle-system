<?php


namespace BattleSystem\Items;


use BattleSystem\Units\UnitInterface;

class Bow implements ItemsInterface
{

    protected int $attack = 15;

    public function modify(UnitInterface $unit): void
    {
        $unit->setAttack($unit->getAttack()+$this->attack);
    }
}