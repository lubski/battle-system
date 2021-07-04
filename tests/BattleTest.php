<?php

namespace BattleSystem\Tests;

use BattleSystem\Battle;
use BattleSystem\RoundInterface;
use BattleSystem\Units\UnitInterface;

class BattleTest extends BattleTests
{
    private Battle $battle;
    private $attackerMock;
    private $defenderMock;
    private $roundMock;

    protected function setUp(): void
    {
        $this->battle = new Battle();
        $this->attackerMock = $this->createMock(UnitInterface::class);
        $this->defenderMock = $this->createMock(UnitInterface::class);
        $this->roundMock = $this->createMock(RoundInterface::class);
    }

    public function testAttack()
    {
        $this->attackerMock->expects($this->once())->method('getAttack')->willReturn(100);
        $this->defenderMock->expects($this->once())->method('getDefense')->willReturn(20);
        $this->battle->attack($this->attackerMock, $this->defenderMock, $this->roundMock);

    }

    public function testCalculateAttackTakesDamage() {

        $this->attackerMock->expects($this->once())->method('getAttack')->willReturn(100);
        $this->defenderMock->expects($this->once())->method('getDefense')->willReturn(20);
        $this->assertGreaterThan(60, $this->callMethod($this->battle, 'calculateAttack', [$this->attackerMock, $this->defenderMock]));
    }

    public function testCalculateAttackTakesOneDamage() {

        $this->attackerMock->expects($this->once())->method('getAttack')->willReturn(100);
        $this->defenderMock->expects($this->once())->method('getDefense')->willReturn(120);
        $this->assertSame(1, $this->callMethod($this->battle, 'calculateAttack', [$this->attackerMock, $this->defenderMock]));
    }
}
