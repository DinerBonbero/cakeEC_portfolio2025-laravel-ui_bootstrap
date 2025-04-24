<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirmation()
    { //carts.indexの「注文ボタン」を押した時

        $cartItems = Cart::with('item')->cart()->get();
        $userInfo = UserInfo::info()->first(); //info()はscopeの認証ユーザーidの該当するuser_idのwhere()

        if (empty($userInfo)) { //ユーザー情報が空の時はuser_info.addに遷移
            return redirect()->route('user_info.add');
        }

        return view('order.confirmation', compact('cartItems', 'userInfo')); //ユーザー情報が空でなければ確認画面を表示します
    }

    public function complete()
    {

        $totalPrice = 0;
        $orderDate = date('Y-m-d');

        $cartItems = Cart::with('item')->cart()->get(); //ログインユーザーのカートの商品レコードを全て抽出

        // foreach ($cartItems as $cartItem) {
        //     $totalPrice += $cartItem->num * $cartItem->item->price; //合計金額の算出
        // }
        //下記に書き換え

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->num * $cartItem->item->price;
        });

        // var_dump($totalPrice);
        // var_dump($orderDate);
        // exit();

        $order = Order::create([ //order(注文票)レコード作成※1行のみ
            'user_id' => Auth::id(),
            'order_date' => $orderDate,
            'total' => $totalPrice
        ]);

        foreach ($cartItems as $cartItem) { //抽出したカートの商品をorderDetailに全て登録(移すイメージ)

            OrderDetail::create([
                'order_id' => $order->id,//注文したorderレコードのid
                'item_id' => $cartItem->item_id,
                'num' => $cartItem->num
            ]);
        }

        Cart::cart()->delete(); //orderdetailに登録が終わったらカート内の削除

        return redirect()->route('order.after');
    }

    public function after() //注文処理完了後のページ
    {

        return view('order.after');
    }

    public function history()
    {

        $orders = Order::with('orderdetails.item')->order()->orderby('order_date', 'desc')->paginate(3); //認証ユーザーのオーダーレコード一括取得

        // dd($orders);
        // exit();

        return view('order.history', compact('orders'));
    }
}
