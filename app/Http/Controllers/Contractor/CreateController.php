<?php

namespace App\Http\Controllers\Contractor;

use App\Models\Contractor;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $contractors = Contractor::all();
        return view('contractor.create', compact('contractors'));
    }
}
