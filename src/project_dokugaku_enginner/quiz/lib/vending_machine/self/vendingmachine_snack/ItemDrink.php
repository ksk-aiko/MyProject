<?php

require_once(__DIR__ . '/ItemInterface.php');

class ItemDrink implements ItemInterface
{
    private const PRICE = [
        'cider' => 100, 
        'cola' => 150,
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
        return 0;
    }
}