<?php

require_once(__DIR__ . '/ItemCoffee.php');

class CupDrink extends ItemCoffee
{
    private const PRICES = [
        'ice cup coffee' => 100,
        'hot cup coffee' => 100,
    ];

    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function getPrice(): int
    {
        return self::PRICES[$this->name];
    }

    public function getCupNumber(): int
    {
        return 1;
    }
}