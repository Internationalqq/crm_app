<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        $this->service->update($data, $order);
        return redirect()->route('order.index', $order->id);
    }
}
