<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function orderdetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeOrder(Builder $query): Builder
    {
        return $query->where('user_id', Auth::id());
    }
}

?>
