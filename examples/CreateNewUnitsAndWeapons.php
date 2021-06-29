<?php

require_once 'vendor/autoload.php';

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
