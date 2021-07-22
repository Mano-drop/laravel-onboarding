<?php

namespace Src\SaleOrder\Domain\ValueObjects;

final class SaleOrderClient
{
    private $value;

    public function __construct(string $client)
    {
        $this->value = $client;
    }

    public function value(): string
    {
        return $this->value;
    }
}