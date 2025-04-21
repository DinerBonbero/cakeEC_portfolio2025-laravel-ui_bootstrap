<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [ //書き換え防止
        'id'
    ];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class); //アイテムは1カートテーブルは多の関係
    }

    public function orderdetails(): HasMany //アイテムは1オーダー詳細は多
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeItem(Builder $query, $itemId)
    {
        return $query->where('item_id', $itemId);
    }

}

?>
