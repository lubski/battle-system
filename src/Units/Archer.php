<?php


namespace BattleSystem\Units;


class Archer extends AbstractUnit
{
    /**
     * Units base attributes
     */
    protected array $baseAttributes = [
        'attack' => 50,
        'defense' => 20,
        'health' => 100
    ];
}