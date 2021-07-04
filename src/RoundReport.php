<?php


namespace BattleSystem;


class RoundReport
{
    private RoundInterface $round;

    public function __construct(RoundInterface $round)
    {
        $this->round = $round;
    }

    public function __toString()
    {
        return "Round: ".$this->round->getNumber().": attacker: ".$this->round->getAttackerBefore()->getName()." (".$this->round->getAttackerBefore()->getHealth().")"
            ." defender: ".$this->round->getDefenderBefore()->getName()." (".$this->round->getDefenderBefore()->getHealth().")"
            ." receives damage (".$this->round->getDamageAttacker().") and counterattack with damage (".$this->round->getDamageDefender().")"
            .". Defender health after attack (".$this->round->getDefenderAfter()->getHealth()."), Attacker health after attack (".$this->round->getAttackerAfter()->getHealth().")".PHP_EOL;
    }


}