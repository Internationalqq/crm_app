<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected static function booted()
    {
        // Применяем глобальный скоуп для фильтрации по user_id
        static::addGlobalScope('userOrders', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
