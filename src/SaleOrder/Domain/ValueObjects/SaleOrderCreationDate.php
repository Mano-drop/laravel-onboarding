<?php

namespace Src\SaleOrder\Domain\ValueObjects;

final class SaleOrderCreationDate
{
    private $value;

    public function __construct(string $creationDate)
    {
        $this->value = $creationDate;
    }

    public function value(): string
    {
        return $this->value;
    }
}