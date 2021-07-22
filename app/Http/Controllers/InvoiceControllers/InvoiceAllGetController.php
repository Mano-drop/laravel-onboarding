<?php

namespace App\Http\Controllers\InvoiceControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\InvoiceServices\InvoiceAllGetService;


class InvoiceAllGetController extends Controller
{
    private $service;

    public function __construct(InvoiceAllGetService $invoiceAllGetService)
    {
        $this->service = $invoiceAllGetService;
    }
    public function __invoke()
    {
        return $this->service->read();
    }
}
