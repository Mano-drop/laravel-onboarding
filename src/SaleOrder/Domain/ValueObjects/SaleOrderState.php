<?php

namespace Src\SaleOrder\Domain\ValueObjects;

final class SaleOrderState
{
    private $value;

    public function __construct(string $state)
    {
        $this->value = $state;
    }

    public function value(): string
    {
        return $this->value;
    }
}