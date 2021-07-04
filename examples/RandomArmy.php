<?php

use BattleSystem\Battle;
use BattleSystem\RandomArmy;
use BattleSystem\RoundReport;
use BattleSystem\War;

require_once 'vendor/autoload.php';

$battleSystem = new Battle();

//Random army creator
$war = new War(
    new RandomArmy("Persian Random", [], 500, 600),
    new RandomArmy("Turkey Random", [], 500, 600),
    $battleSystem);

echo "Result of the war 1:".PHP_EOL;

foreach($war->begin() as $round) {
    $formatter = new RoundReport($round);
    echo $formatter;
}

echo PHP_EOL.PHP_EOL;
echo "War 1: ".($war->getWinner() ? "WINNER IS " . $war->getWinner()->getName() : "NOBODY WON" )."!!".PHP_EOL;

echo PHP_EOL."[Memory used: " . (memory_get_peak_usage(true) / 1024 / 1024). " MB]".PHP_EOL;