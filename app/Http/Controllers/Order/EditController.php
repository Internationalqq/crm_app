<?php

namespace App\Http\Controllers\Order;

use App\Models\Contractor;
use App\Models\Order;

class EditController extends BaseController
{
    public function __invoke(Order $order)
    {
        $contractors = Contractor::all();

        return view('order.edit', compact('order', 'contractors'));
    }
}
