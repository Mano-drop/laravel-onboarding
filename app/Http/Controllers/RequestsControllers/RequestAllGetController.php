<?php

namespace App\Http\Controllers\RequestsControllers;

use App\Models\RequestOrder;
use Illuminate\Routing\Controller;


class RequestGetAllController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function __invoke()
    {
        $dataRequestOrder = RequestOrder::with('itemsRequests')->get();
        return response()->json($dataRequestOrder);

    }
}
