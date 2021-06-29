<?php

require_once 'vendor/autoload.php';

use BattleSystem\Army;
use BattleSystem\Battle;
use BattleSystem\Items\Bow;
use BattleSystem\Items\ImprovedBow;
use BattleSystem\Items\ImprovedShield;
use BattleSystem\Items\ImprovedSword;
use BattleSystem\Items\Shield;
use BattleSystem\Items\Sword;
use BattleSystem\RoundConsoleOutput;
use BattleSystem\Units\Archer;
use BattleSystem\Units\ImprovedArcher;
use BattleSystem\Units\ImprovedSwordsman;
use BattleSystem\Units\Swordsman;
use BattleSystem\War;

$army1 = new Army("Hussars", [
    new Archer("Archer 1"),
    new Archer("Archer 2", [new Bow()]),
    new Archer("Archer 3", [new ImprovedBow()]),
    new ImprovedArcher("ImprovedArcher 4"),
    new ImprovedArcher("ImprovedArcher 5", [new ImprovedBow()]),
    new Swordsman("Swordsman 6"),
    new Swordsman("Swordsman 7", [new Sword(), new Shield()]),
    new Swordsman("Swordsman 8", [new ImprovedSword(), new ImprovedShield()]),
    new ImprovedSwordsman("ImprovedSwordsman 9"),
    new ImprovedSwordsman("ImprovedSwordsman 10", [new ImprovedSword()]),
]);

$army2 = new Army("Crusaders",[
    new Archer("Archer 11"),
    new Archer("Archer 12", [new Bow()]),
    new Archer("Archer 13", [new ImprovedBow()]),
    new ImprovedArcher("ImprovedArcher 14"),
    new ImprovedArcher("ImprovedArcher 15", [new ImprovedBow()]),
    new Swordsman("Swordsman 16"),
    new Swordsman("Swordsman 17", [new Sword()]),
    new Swordsman("Swordsman 18", [new ImprovedSword(), new Shield()]),
    new Swordsman("Swordsman 19", [new ImprovedSword(), new ImprovedShield()]),
    new ImprovedSwordsman("ImprovedSwordsman 20"),
    new ImprovedSwordsman("ImprovedSwordsman 21", [new ImprovedSword()]),
]);

$battleSystem = new Battle();
$war = new War($army1, $army2, $battleSystem);
$war->skirmish();
echo "Result of the war:".PHP_EOL;

foreach ($battleSystem->getRounds() as $round) {
    $formatter = new RoundConsoleOutput($round);
    echo $formatter;
}

echo PHP_EOL.PHP_EOL;
echo "WINNER IS ".$war->getWinner()->getName().PHP_EOL;

