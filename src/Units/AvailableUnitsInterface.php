<?php


namespace BattleSystem\Units;


interface AvailableUnitsInterface
{
    public const AVAILABLEUNITS = [
        Archer::class,
        ImprovedArcher::class,
        Swordsman::class,
        ImprovedSwordsman::class
    ];
}