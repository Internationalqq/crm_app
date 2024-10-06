<?php

namespace App\Http\Controllers\Contractor;

use App\Http\Requests\Contractor\UpdateRequest;
use App\Models\Contractor;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Contractor $contractor)
    {
        $data = $request->validated();
        $this->service->update($data, $contractor);
        return redirect()->route('order.index', $contractor->id);
    }
}
