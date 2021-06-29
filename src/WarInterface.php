<?php


namespace BattleSystem;


interface WarInterface
{
    public function skirmish();

    public function getWinner(): ArmyAbstract;
}