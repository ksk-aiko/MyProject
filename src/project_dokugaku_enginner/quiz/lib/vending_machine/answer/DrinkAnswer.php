<?php

require_once(__DIR__ . '/ItemCoffee.php');

class DrinkAnswer extends ItemCoffee
{
    private const PRICES = [
        'cider' => 100,
        'cola' => 150,
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
        return 0;
    }
}