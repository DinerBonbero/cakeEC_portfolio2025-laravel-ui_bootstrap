<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}

?>
