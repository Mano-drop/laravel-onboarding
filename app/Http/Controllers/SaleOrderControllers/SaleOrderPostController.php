<?php

namespace App\Http\Controllers\SaleOrderControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleOrderResource;
use Illuminate\Http\Request;


class SaleOrderPostController extends Controller
{
    private $saleOrderPostController;

    public function __construct(\Src\SaleOrder\Infrastructure\SaleOrderPostController $saleOrderPostController)
    {
        $this->saleOrderPostController = $saleOrderPostController;
    }

    public function __invoke(Request $request)
    {
        $newSaleOrder = new SaleOrderResource($this->saleOrderPostController->__invoke($request));
    }
}