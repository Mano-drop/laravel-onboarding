<?php

namespace App\Http\Controllers\RequestsControllers;

use App\Models\RequestOrder;
use Illuminate\Routing\Controller;

class RequestGetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($id)
    {
        $dataRequestOrder = RequestOrder::with('itemsRequests')->find($id);
        return response()->json($dataRequestOrder);

    }
}
