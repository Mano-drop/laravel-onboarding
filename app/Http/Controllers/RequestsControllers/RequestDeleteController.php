<?php

namespace App\Http\Controllers\RequestsControllers;

use App\Models\RequestOrder;
use Illuminate\Routing\Controller;


class RequestDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $deleteRequestOrder = RequestOrder::with('itemsRequests')->find($id);
        $deleteRequestOrder->destroy($id);
        return response("the request with the id ${id} has been deleted");
    }
}
