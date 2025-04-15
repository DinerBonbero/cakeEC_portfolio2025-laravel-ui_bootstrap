<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class Cart extends Model
{
    use HasFactory;//ファクトリーの宣言

    protected $guarded = [ //書き換え防止
        'id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id'); //カートは多アイテムは1の関係
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeCart(Builder $query): Builder //スコープ:コントローラで呼び出せるwhereの自作関数
    {
        return $query->where('user_id', Auth::id());
    }

    public function scopeByUserAndItem(Builder $query, $itemId)
    {
        return $query->where('user_id', Auth::id())->where('item_id', $itemId);
    }
}

?>