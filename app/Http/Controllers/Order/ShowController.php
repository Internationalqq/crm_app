<?php

namespace App\Http\Controllers\Order;

use App\Models\Contractor;
use App\Models\Order;

class ShowController extends BaseController
{

    public function __invoke(Order $order)
    {
        $contractors = Contractor::all();

        return view('order.show', compact('order', 'contractors'));
    }
}
