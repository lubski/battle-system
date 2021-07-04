<?php


namespace BattleSystem\Items;

interface AvailableItemsInterface
{
    public const AVAILABLEITEMS = [
        Bow::class,
        ImprovedBow::class,
        Shield::class,
        ImprovedShield::class,
        Sword::class,
        ImprovedSword::class
    ];
}