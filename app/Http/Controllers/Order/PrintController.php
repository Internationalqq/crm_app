<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;
use setasign\Fpdi\Fpdi;

class PrintController extends BaseController
{
    public function __invoke(StoreRequest $request, $id)
    {
        $order = Order::findOrFail($id);

        return view('order.print', compact('order'));
    }
}
