<?php


namespace BattleSystem;


use BattleSystem\Units\UnitInterface;

interface BattleInterface
{
    /**
     * @param UnitInterface $attacker
     * @param UnitInterface $defender
     * @return mixed
     */
    public function attack(UnitInterface $attacker, UnitInterface $defender): void;

    public function getRounds(): array;
}