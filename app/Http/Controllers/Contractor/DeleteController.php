<?php

namespace App\Http\Controllers\Contractor;

use App\Models\Contractor;

class DeleteController extends BaseController
{
    public function __invoke(Contractor $contractor)
    {
        $contractor->delete();
        return redirect()->route('order.index');
    }
}
