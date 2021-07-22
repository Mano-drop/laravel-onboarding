<?php

namespace Src\SaleOrder\Domain\Contracts;

use Src\SaleOrder\Domain\SaleOrder;
use Src\SaleOrder\Domain\ValueObjects\SaleOrderId;

interface SaleOrderRepositoryContract
{
    public function save(SaleOrder $saleOrder): void;
}