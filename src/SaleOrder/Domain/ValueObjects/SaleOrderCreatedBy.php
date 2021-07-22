<?php

namespace Src\SaleOrder\Domain\ValueObjects;

final class SaleOrderCreatedBy
{
    private $value;

    public function __construct(string $createdBy)
    {
        $this->value = $createdBy;
    }

    public function value(): string
    {
        return $this->value;
    }
}