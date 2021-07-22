<?php

namespace Src\SaleOrder\Domain\ValueObjects;

final class SaleOrderObservation
{
    private $value;

    public function __construct(string $observation)
    {
        $this->value = $observation;
    }

    public function value(): string
    {
        return $this->value;
    }
}