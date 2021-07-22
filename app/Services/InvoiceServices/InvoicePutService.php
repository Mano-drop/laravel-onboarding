<?php

namespace App\Services\InvoiceServices;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class InvoicePutService
{
    private $repository;

    public function __construct(BaseRepositoryInterface $invoicePutRepository)
    {
        $this->repository = $invoicePutRepository;
        http_response_code(404);

    }

    public function update($body, $id)
    {
        if($this->repository->update($body->toArray(), $id)){
            http_response_code(201);
        }

        return http_response_code();
    }

}
