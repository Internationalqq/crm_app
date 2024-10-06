<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contractor extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('userContractors', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }
}
