<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Cart;

class ItemController extends Controller
{
    public function __construct()
    {
        // index, showの認証を除外
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $items = Item::paginate(8);
        return view('items.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        $cartItem = Cart::byUserAndItem($item->id)->first();
        
        return view('items.show', ['item' => $item, 'itemNum' => $cartItem->num ?? null]);//null合体演算子

    }

}
