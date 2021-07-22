<?php

namespace App\Http\Controllers\InvoiceControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\InvoiceServices\InvoiceDeleteService;

class InvoiceDeleteController extends Controller
{
    private $service;

    public function __construct(InvoiceDeleteService $invoiceDeleteService)
    {
        $this->service = $invoiceDeleteService;
    }

    public function __invoke($id)
    {
        return $this->service->delete($id);
    }
}
