<?php

require_once(__DIR__ . '/ItemInterface.php');

class ItemSnack implements ItemInterface
{
    private const  PRICE = [
        'potato chips' => 150,
    ];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getPrice(): int
    {
        return self::PRICE[$this->name];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCupNumber(): int
    {
        return 0;
    }
}