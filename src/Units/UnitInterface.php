<?php


namespace BattleSystem\Units;


use BattleSystem\Items\ItemsInterface;

interface UnitInterface
{

    public function getAttributes(): array;

    public function getAttribute(string $type): int;

    public function setAttribute(string $type, int $value): void;

    public function setAttributes(array $attributes): void;

    public function addItem(ItemsInterface $item): void;

    public function isDestroyed(): bool;

    public function getName(): string;

    public function getHealth(): int;

    public function getDefense(): int;

    public function getAttack(): int;

    public function setHealth(int $health): void;

    public function setDefense(int $defense): void;

    public function setAttack(int $attack): void;
}