<?php

namespace App\Services\InvoiceServices;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class InvoicePostService
{
    private $repository;

    public function __construct(BaseRepositoryInterface $invoicePostRepository)
    {
        $this->repository = $invoicePostRepository;
        http_response_code(404);

    }

    public function create($body)
    {
        if($this->repository->create( $body->toArray())){
            http_response_code(201);
        }
        return http_response_code();
    }

}
