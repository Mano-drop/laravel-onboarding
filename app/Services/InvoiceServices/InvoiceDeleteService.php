<?php

namespace App\Services\InvoiceServices;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class InvoiceDeleteService
{
    private $repository;

    public function __construct(BaseRepositoryInterface $invoiceDeleteRepository)
    {
        $this->repository = $invoiceDeleteRepository;

        http_response_code(404);
    }

    public function delete($id)
    {
        if( $this->repository->delete($id) ){
            http_response_code(204);
        }

        return http_response_code();
    }
}
