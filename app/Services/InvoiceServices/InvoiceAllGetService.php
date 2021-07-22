<?php

namespace App\Services\InvoiceServices;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class InvoiceAllGetService
{
    private $repository;

   public function __construct(BaseRepositoryInterface $invoiceAllGetRepository)
    {
        $this->repository = $invoiceAllGetRepository;
    }

    public function read()
    {
        return $this->repository->read();
    }
}
