# battle system V0.1
> Sample project battle system for calculate fight.  
> You can create an army with collection of unit. Each unit can be equipped of any weapon.
> Each equipped weapon modified unit attributes like attack, defense or health.
> Units nad weapons can be extended, and You can simply add new types of units and weapons.
> When battle begins system automatically calculates winner and damage taken on each round.
> Battle will end when one of army don't have units and loses battle.

## Project Status
Project is: _in progress_.

## Technologies Used
Languages:
- [PHP](https://www.php.net/)

## Frameworks / Tools
- [Composer](https://getcomposer.org/)
- [PHPUnit](https://phpunit.de/)

Design Pattern/Principles:
- [Solid Principles](https://en.wikipedia.org/wiki/SOLID)

## Examples Usage
See all [examples](https://github.com/lubski/battle-system/tree/main/examples) starting war, creating new units, weapons or extend them.

### Units / Weapons
- Easy creating new Units and weapons supported by system
- Possible extend weapons and unit for better fight
- Adding weapons to Units automatically calculates their attributes for fight 
```php
use BattleSystem\Items\ItemsInterface;
use BattleSystem\Units\AbstractUnit;
use BattleSystem\Units\UnitInterface;

class DoubleSword implements ItemsInterface {

    protected int $attack = 50;
    protected int $defense = 50;
    /**
     * @inheritDoc
     */
    public function modify(UnitInterface $unit): void
    {
        $unit->setDefense($unit->getDefense()+$this->defense);
        $unit->setAttack($unit->getAttack()+$this->attack);
    }
}

class HeavyDoubleSword extends DoubleSword {
    protected int $attack = 80;
}

class Crusader extends AbstractUnit {
    /**
     * Units base attributes
     */
    protected array $baseAttributes = [
        'attack' => 160,
        'defense' => 120,
        'health' => 100
    ];
}

class HeavyCrusader extends Crusader {
    /**
     * Units base attributes
     */
    protected array $baseAttributes = [
        'attack' => 180,
        'defense' => 160,
        'health' => 100
    ];
}

class LightShield implements ItemsInterface {

    protected int $defense = 40;
    public function modify(UnitInterface $unit): void
    {
        $unit->setDefense($unit->getDefense()+$this->defense);
    }
}

$heavyCrusader = new HeavyCrusader("Crusader 1", [new HeavyDoubleSword(), new LightShield()]);
echo $heavyCrusader->getAttack().PHP_EOL; //260
echo $heavyCrusader->getDefense().PHP_EOL; //250
```
### Example war
- Automatically war ending when army don't have units to fight
- Fight dived by rounds
- every round have advanced report before/after fight changes
- Easy support new creating units and weapons
```php
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

$roundCounter = 1;
foreach ($battleSystem->getRounds() as $round) {
    $formatter = new RoundConsoleOutput($round);
    echo $formatter;
}

echo PHP_EOL.PHP_EOL;
echo "WINNER IS ".$war->getWinner()->getName().PHP_EOL;
```

## Room for Improvement
- Make all test coverage 70%
- Implementing class ArmyBuilder [(Builder Pattern)](https://designpatternsphp.readthedocs.io/en/latest/Creational/Builder/README.html) for better and transparent creating army
- Create new Units and Weapons

## Contact
Created by [Tomasz Lublin](mailto:lubski@gmail.com)


