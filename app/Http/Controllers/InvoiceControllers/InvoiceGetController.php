<?php

namespace App\Http\Controllers\InvoiceControllers;


use Illuminate\Routing\Controller;
use App\Services\InvoiceServices\InvoiceGetService;

class InvoiceGetController extends Controller
{
    private $service;

    public function __construct(InvoiceGetService $invoiceGetService)
    {
        $this->service = $invoiceGetService;
    }

    public function __invoke($id)
    {
        return $this->service->readById($id);
    }
}
