<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Order\BaseController;


class NotreadyController extends BaseController
{
    public function index()
    {

        return view('notready');
    }
}
