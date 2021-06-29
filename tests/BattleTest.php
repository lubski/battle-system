<?php

namespace BattleSystem\Tests;

use BattleSystem\Battle;
use BattleSystem\Units\UnitInterface;

class BattleTest extends BattleTests
{
    private Battle $battle;

    protected function setUp(): void
    {
        $this->battle = new Battle();
    }

    public function testGetRounds()
    {

        $this->assertIsArray($this->battle->getRounds());
    }

    public function testAttack()
    {
        $attacker = $this->createMock(UnitInterface::class);
        $defender = $this->createMock(UnitInterface::class);

        $attacker->expects($this->once())->method('getAttack')->willReturn(100);
        $defender->expects($this->once())->method('getDefense')->willReturn(20);
        $defender->expects($this->once())->method('isDestroyed');
        $this->battle->attack($attacker, $defender);

    }

    public function testCalculateAttackTakesDamage() {

        $attacker = $this->createMock(UnitInterface::class);
        $defender = $this->createMock(UnitInterface::class);

        $attacker->expects($this->once())->method('getAttack')->willReturn(100);
        $defender->expects($this->once())->method('getDefense')->willReturn(20);
        $this->assertGreaterThan(60, $this->callMethod($this->battle, 'calculateAttack', [$attacker, $defender]));
    }

    public function testCalculateAttackTakesOneDamage() {

        $attacker = $this->createMock(UnitInterface::class);
        $defender = $this->createMock(UnitInterface::class);

        $attacker->expects($this->once())->method('getAttack')->willReturn(100);
        $defender->expects($this->once())->method('getDefense')->willReturn(120);
        $this->assertSame(1, $this->callMethod($this->battle, 'calculateAttack', [$attacker, $defender]));
    }
}
