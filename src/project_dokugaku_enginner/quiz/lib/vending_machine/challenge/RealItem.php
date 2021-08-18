<?php

abstract class RealItem
{
    abstract public function getPrice();
    abstract public function getCupNumber();

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}