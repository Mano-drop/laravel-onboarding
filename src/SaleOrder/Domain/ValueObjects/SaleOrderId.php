<?php

namespace Src\SaleOrder\Domain\ValueObjects;

use InvalidArgumentException;

final class SaleOrderId
{
    private $value;

    public function __construct(int $id)
    {
        $this->validate($id);
        $this->value = $id;
    }

    private function validate(int $id): void
    {
        $options = array(
            'options' => array(
                'min_range' => 1,
            )
        );

        if (!filter_var($id, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> Does not allow the value <%s>.', static::class, $id)
            );
        }
    }

    public function value(): int
    {
        return $this->value;
    }

}