<?php


namespace BattleSystem;

use BattleSystem\Units\UnitInterface;

class Round
{

    protected int $number;

    protected UnitInterface $attackerBefore;

    protected UnitInterface $attackerAfter;

    protected UnitInterface $defenderBefore;

    protected UnitInterface $defenderAfter;

    protected int $damage;

    protected bool $reply;

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
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    /**
     * @return bool
     */
    public function isReply(): bool
    {
        return $this->reply;
    }

    /**
     * @param bool $reply
     */
    public function setReply(bool $reply): void
    {
        $this->reply = $reply;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }


}