<?php

namespace App\Http\Controllers\Order;

use App\Models\Contractor;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $contractors = Contractor::all();

        return view('order.create', compact('contractors'));
    }
}
