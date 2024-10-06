<?php

namespace App\Services\Contractor;

use App\Models\Contractor;
use Illuminate\Support\Facades\Auth;

class Service
{

    public function store($data)
    {
        // $tags = $data['tags'];
        // unset($data['tags']);
        $data['user_id'] = Auth::id();
        $contractor = Contractor::create($data);

        // $order->tags()->attach($tags);
    }

    public function update($data, $contractor)
    {
        // $tags = $data['tags'];
        // unset($data['tags']);
        if ($contractor->user_id != Auth::id()) {
            abort(403, 'У вас нет прав для редактирования этого контрагента.');
        }

        $contractor->update($data);
        // $order->tags()->sync($tags);
    }
}
