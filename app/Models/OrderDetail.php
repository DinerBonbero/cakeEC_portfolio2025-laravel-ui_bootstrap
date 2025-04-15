<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class OrderDetail extends Model
{
    
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function scopeOrderDetail(Builder $query, $orderId): Builder
    {
        return $query->where('order_id', $orderId);
    }

}

?>