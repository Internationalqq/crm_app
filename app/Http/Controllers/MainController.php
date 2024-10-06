<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Order\BaseController;
use App\Models\Contractor;
use App\Models\Order;

class MainController extends BaseController
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $contractors = Contractor::all();

        return view('order.index', compact('orders', 'contractors'));
    }
}
