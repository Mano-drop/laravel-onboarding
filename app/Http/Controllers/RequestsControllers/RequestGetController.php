<?php

namespace App\Http\Controllers\RequestsControllers;

use App\Models\RequestOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class RequestGetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $id
     * @return JsonResponse
     */
    public function __invoke($id)
    {
        $dataRequestOrder = RequestOrder::with('itemsRequests')->find($id);
        return response()->json($dataRequestOrder);

    }
}
