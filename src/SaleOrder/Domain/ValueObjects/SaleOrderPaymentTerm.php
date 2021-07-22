<?php

namespace Src\SaleOrder\Domain\ValueObjects;

final class SaleOrderPaymentTerm
{
    private $value;

    public function __construct(string $paymentTerm)
    {
        $this->value = $paymentTerm;
    }

    public function value(): string
    {
        return $this->value;
    }
}