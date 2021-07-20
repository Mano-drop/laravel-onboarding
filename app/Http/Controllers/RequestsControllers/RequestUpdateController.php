<?php

namespace App\Http\Controllers\RequestsControllers;

use App\Models\ItemsRequest;
use App\Models\RequestOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class RequestUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $date = Carbon::now();
        $dRequestOrder = RequestOrder::find($id);
        $dRequestOrder->date = $date;
        $dRequestOrder->created_by = $request->created_by;
        $dRequestOrder->status = $request->status;
        $dRequestOrder->observations = $request->observations;

        $dRequestOrder->save();

        $itemsR = [];

        foreach ($request->itemsReq as $itemsReq) {

            $dataItems = ItemsRequest::find($itemsReq["id"]);

            if (empty($dataItems)) {
                $itemsR[] = new ItemsRequest($itemsReq);

            } else {
                $dataItems->product_name = $itemsReq["product_name"];
                $dataItems->amount = $itemsReq["amount"];
                $dataItems->save();
            }
        }
        $dRequestOrder->itemsRequests()->saveMany($itemsR);

        return response("the request has been updated");

    }
}
