<?php

namespace App\Http\Controllers\InvoiceControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\InvoiceServices\InvoicePostService;


class InvoicePostController extends Controller
{
    private $service;

    public function __construct(InvoicePostService $invoicePostService)
    {
        $this->service = $invoicePostService;
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->service->create($request);
    }
}
