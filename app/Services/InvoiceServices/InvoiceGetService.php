<?php

namespace App\Services\InvoiceServices;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class InvoiceGetService
{
    private $repository;

    public function __construct(BaseRepositoryInterface $invoiceGetRepository)
    {
        $this->repository = $invoiceGetRepository;
        http_response_code(404);
    }

    public function readById($id)
    {
        if ($this->repository->readById($id)) {
            return $this->repository->readById($id);
        }
        return http_response_code();
    }
}
