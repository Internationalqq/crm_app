<?php

namespace App\Http\Controllers\Contractor;

use Illuminate\Http\Request;
use App\Models\Contractor;

class SearchController extends BaseController
{
    public function __invoke(Request $request)
    {
        $query = $request->get('q');
        $contractors = Contractor::where('title', 'like', '%' . $query . '%')->get();

        return response()->json($contractors);
    }
}
