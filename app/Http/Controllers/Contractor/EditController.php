<?php

namespace App\Http\Controllers\Contractor;

use App\Models\Contractor;
use App\Models\Order;

class EditController extends BaseController
{
    public function __invoke(Order $order)
    {
        $contractors = Contractor::all();

        return view('contractor.edit', compact('order', 'contractors'));
    }
}
