<?php


namespace BattleSystem;


use BattleSystem\Army\ArmyInterface;

interface WarInterface
{
    public function warIsOver():bool;

    public function getWinner(): ?ArmyInterface;

    public function getArmy(int $number): ArmyInterface;

    public function resupplyArmies(): void;
}