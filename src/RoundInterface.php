<?php


namespace BattleSystem;


use BattleSystem\Units\UnitInterface;

interface RoundInterface
{
    /**
     * @return UnitInterface
     */
    public function getAttackerBefore(): UnitInterface;


    /**
     * @param UnitInterface $attackerBefore
     */
    public function setAttackerBefore(UnitInterface $attackerBefore): void;


    /**
     * @return UnitInterface
     */
    public function getAttackerAfter(): UnitInterface;


    /**
     * @param UnitInterface $attackerAfter
     */
    public function setAttackerAfter(UnitInterface $attackerAfter): void;


    /**
     * @return UnitInterface
     */
    public function getDefenderBefore(): UnitInterface;


    /**
     * @param UnitInterface $defenderBefore
     */
    public function setDefenderBefore(UnitInterface $defenderBefore): void;


    /**
     * @return UnitInterface
     */
    public function getDefenderAfter(): UnitInterface;


    /**
     * @param UnitInterface $defenderAfter
     */
    public function setDefenderAfter(UnitInterface $defenderAfter): void;


    /**
     * @return int
     */
    public function getDamageAttacker(): int;


    /**
     * @param int $damage
     */
    public function setDamageAttacker(int $damage): void;

    /**
     * @return int
     */
    public function getDamageDefender(): int;


    /**
     * @param int $damage
     */
    public function setDamageDefender(int $damage): void;


    /**
     * @return int
     */
    public function getNumber(): int;
}