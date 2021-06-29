<?php


namespace BattleSystem;


class RoundConsoleOutput
{
    private Round $round;

    public function __construct(Round $round)
    {
        $this->round = $round;
    }

    public function __toString()
    {
        $isReply = "";

        if($this->round->isReply()) {
            $isReply = " counterattack";
        }

        return "Round".$isReply.": ".$this->round->getNumber().": attacker: ".$this->round->getAttackerBefore()->getName()." (".$this->round->getAttackerBefore()->getHealth().")"
            ." defender: ".$this->round->getDefenderBefore()->getName()." (".$this->round->getDefenderBefore()->getHealth().")"
            ." receives damage (".$this->round->getDamage().") defender health after attack (".$this->round->getDefenderAfter()->getHealth().")".PHP_EOL;
    }


}