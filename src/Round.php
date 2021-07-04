<?php


namespace BattleSystem;

use BattleSystem\Units\UnitInterface;

class Round implements RoundInterface
{

    protected int $number;

    protected UnitInterface $attackerBefore;

    protected UnitInterface $attackerAfter;

    protected UnitInterface $defenderBefore;

    protected UnitInterface $defenderAfter;

    protected int $damageAttacker;

    protected int $damageDefender;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return UnitInterface
     */
    public function getAttackerBefore(): UnitInterface
    {
        return $this->attackerBefore;
    }

    /**
     * @param UnitInterface $attackerBefore
     */
    public function setAttackerBefore(UnitInterface $attackerBefore): void
    {
        $this->attackerBefore = $attackerBefore;
    }

    /**
     * @return UnitInterface
     */
    public function getAttackerAfter(): UnitInterface
    {
        return $this->attackerAfter;
    }

    /**
     * @param UnitInterface $attackerAfter
     */
    public function setAttackerAfter(UnitInterface $attackerAfter): void
    {
        $this->attackerAfter = $attackerAfter;
    }

    /**
     * @return UnitInterface
     */
    public function getDefenderBefore(): UnitInterface
    {
        return $this->defenderBefore;
    }

    /**
     * @param UnitInterface $defenderBefore
     */
    public function setDefenderBefore(UnitInterface $defenderBefore): void
    {
        $this->defenderBefore = $defenderBefore;
    }

    /**
     * @return UnitInterface
     */
    public function getDefenderAfter(): UnitInterface
    {
        return $this->defenderAfter;
    }

    /**
     * @param UnitInterface $defenderAfter
     */
    public function setDefenderAfter(UnitInterface $defenderAfter): void
    {
        $this->defenderAfter = $defenderAfter;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }


    public function getDamageAttacker(): int
    {
        return $this->damageAttacker;
    }

    public function setDamageAttacker(int $damage): void
    {
        $this->damageAttacker = $damage;
    }

    public function getDamageDefender(): int
    {
        return $this->damageDefender;
    }

    public function setDamageDefender(int $damage): void
    {
        $this->damageDefender = $damage;
    }
}