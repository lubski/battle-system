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
        $battle = new Battle();
        $this->assertIsArray($battle->getRounds());
    }

    public function testAttack()
    {
        $battle = new Battle();
        $attacker = $this->createMock(UnitInterface::class);
        $defender = $this->createMock(UnitInterface::class);

        $attacker->expects($this->once())->method('getAttack')->willReturn(100);
        $defender->expects($this->once())->method('getDefense')->willReturn(20);
        $defender->expects($this->once())->method('isDestroyed');
        $battle->attack($attacker, $defender);

    }

    public function testCalculateAttackTakesDamage() {
        $battle = new Battle();

        $attacker = $this->createMock(UnitInterface::class);
        $defender = $this->createMock(UnitInterface::class);

        $attacker->expects($this->once())->method('getAttack')->willReturn(100);
        $defender->expects($this->once())->method('getDefense')->willReturn(20);
        $this->assertGreaterThan(60, $this->callMethod($battle, 'calculateAttack', [$attacker, $defender]));
    }

    public function testCalculateAttackTakesOneDamage() {
        $battle = new Battle();

        $attacker = $this->createMock(UnitInterface::class);
        $defender = $this->createMock(UnitInterface::class);

        $attacker->expects($this->once())->method('getAttack')->willReturn(100);
        $defender->expects($this->once())->method('getDefense')->willReturn(120);
        $this->assertSame(1, $this->callMethod($battle, 'calculateAttack', [$attacker, $defender]));
    }
}
