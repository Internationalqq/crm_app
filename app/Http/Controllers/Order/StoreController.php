<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\StoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        // $contractors = Contractor::all();
        // $order = Order::create($data);
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('order.index');
    }
}
