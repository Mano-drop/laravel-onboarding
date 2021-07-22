<?php

namespace App\Http\Controllers\InvoiceControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\InvoiceServices\InvoicePutService;

class InvoicePutController extends Controller
{
    private $service;

    public function __construct(InvoicePutService $invoicePutService)
    {
        $this->service = $invoicePutService;
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }
}
