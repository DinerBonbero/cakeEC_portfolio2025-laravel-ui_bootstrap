<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Item;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('item')->cart()->get();//認証ユーザーのかごの中の商品を一括取り出し
        //ぺジネーションの際get()をつけてしまうとcolletionで返ってきてしまいうまく作動しない
        //var_dump($cartItems);
        //exit();

        return view('carts.index', compact('cartItems'));
    }

    public function createAndStore(AddToCartRequest $request, Item $item)
    {
        //var_dump($item->id);
        $validated = $request->validated();
        Cart::updateOrCreate(//カート内にアイテムがあれば数量を更新、なければアイテムの数量含むレコードを作成
            [   
                'user_id' => Auth::id(),
                'item_id' => $item->id
            ],
            [
                'user_id' => Auth::id(),
                'item_id' => $item->id,
                'num' => $validated['item_Quantity']
            ]
        );

        return redirect()->route('carts.index');
    }

    public function delete(Item $item)
    { //cartsテーブルの該当商品のレコードを削除
        $itemId = $item->id;
        Cart::byUserAndItem($itemId)->delete();
        return redirect()->route('carts.index');
    }
}
