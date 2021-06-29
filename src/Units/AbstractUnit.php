<?php


namespace BattleSystem\Units;


use BattleSystem\Items\ItemsInterface;
use BattleSystem\NameTrait;

class AbstractUnit implements UnitInterface
{

    use NameTrait;
    /**
     * Units attributes
     *
     * @var array|int[]
     */
    protected array $attributes = [
        'attack' => 0,
        'defense' => 0,
        'health' => 100
    ];

    /**
     * @var array|int[]
     */
    protected array $baseAttributes = [
        'attack' => 0,
        'defense' => 0,
        'health' => 100
    ];

    /**
     * @var ItemsInterface[]
     */
    protected array $items;

    public function __construct( string $name = "", array $items = [])
    {
        $this->setItems($items);
        $this->setName($name);
        $this->recalculateAttributes();
    }

    private function generateName():string {
        return str_replace(__NAMESPACE__."\\", '' , get_class($this));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function addItem(ItemsInterface $item): void
    {
        $this->items[] = $item;
        $this->recalculateAttributes();
    }

    private function recalculateAttributes() {
        $this->attributes = $this->baseAttributes;
        foreach ($this->items as $item) {
            $item->modify($this);
        }
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttribute(string $type, int $value): void
    {
        $this->attributes[$type] = $value < 0 ? 0 : $value;
    }

    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function getAttribute(string $type): int
    {
        if(isset($this->attributes[$type])) {
            return $this->attributes[$type];
        }

        throw new \InvalidArgumentException("Invalid Attribute type");
    }

    /**
     * @param ItemsInterface[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
        $this->recalculateAttributes();
    }

    public function isDestroyed(): bool
    {
        if ($this->getHealth() <=0) {
            return true;
        }

        return false;
    }

    public function getHealth(): int
    {
        return $this->getAttribute(UnitAttributeType::ATTRIBUTE_HEALTH);
    }

    public function getDefense(): int
    {
        return $this->getAttribute(UnitAttributeType::ATTRIBUTE_DEFENSE);
    }

    public function getAttack(): int
    {
        return $this->getAttribute(UnitAttributeType::ATTRIBUTE_ATTACK);
    }

    public function setHealth(int $health): void
    {
        $this->setAttribute(UnitAttributeType::ATTRIBUTE_HEALTH, $health);
    }

    public function setDefense(int $defense): void
    {
        $this->setAttribute(UnitAttributeType::ATTRIBUTE_DEFENSE, $defense);
    }

    public function setAttack(int $attack): void
    {
        $this->setAttribute(UnitAttributeType::ATTRIBUTE_ATTACK, $attack);
    }
}