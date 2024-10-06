<?php

namespace App\Http\Controllers\Contractor;

use App\Http\Requests\Contractor\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        // $contractors = Contractor::all();
        // $data = $request->validated();
        // $order = Order::create($data);
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('order.index');
    }
}
