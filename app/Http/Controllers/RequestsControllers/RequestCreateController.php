<?php

namespace App\Http\Controllers\RequestsControllers;

use App\Models\ItemsRequest;
use App\Models\RequestOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class RequestCreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $date = Carbon::now();

        $dataRequestOrder = new RequestOrder();

        $dataRequestOrder->date = $date;
        $dataRequestOrder->created_by = $request->created_by;
        $dataRequestOrder->status = $request->status;
        $dataRequestOrder->observations = $request->observations;

        $dataRequestOrder->save();

        $itemsR = [];

        foreach ($request->itemsRequests as $itemsRequests) {

            $itemsR[] = new ItemsRequest($itemsRequests);
        }
        $dataRequestOrder->itemsRequests()->saveMany($itemsR);

        return response("the request has been created");
    }
}
