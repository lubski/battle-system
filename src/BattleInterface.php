<?php


namespace BattleSystem;


use BattleSystem\Units\UnitInterface;

interface BattleInterface
{
    /**
     * @param UnitInterface $attacker
     * @param UnitInterface $defender
     * @param RoundInterface $round
     * @return mixed
     */
    public function attack(UnitInterface $attacker, UnitInterface $defender, RoundInterface $round): void;

}