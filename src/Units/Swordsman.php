<?php


namespace BattleSystem\Units;


class Swordsman extends AbstractUnit
{
    /**
     * Units base attributes
     */
    protected array $baseAttributes = [
        'attack' => 40,
        'defense' => 40,
        'health' => 100
    ];

}