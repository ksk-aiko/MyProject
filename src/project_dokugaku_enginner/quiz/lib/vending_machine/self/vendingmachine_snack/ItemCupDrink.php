<?php

require_once(__DIR__ . '/ItemInterface.php');

class ItemCupDrink implements ItemInterface
{
    private const PRICE = [
        'hot cup coffee' => 100,
        'ice cup coffee' => 100,
    ];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return self::PRICE[$this->name];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCupNumber(): int
    {
        return 1;
    }
}