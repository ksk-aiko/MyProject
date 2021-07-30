<?php

class Item
{
    private const PRICES = [
        'cider' => 100,
        'cola' => 150,
        'hot cup coffee' => 100,
        'ice cup coffee' => 100
    ];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getPrice(): int
    {
        return self::PRICES[$this->name];
    }

    public function getName(): string
    {
        return $this->name;
    }
}