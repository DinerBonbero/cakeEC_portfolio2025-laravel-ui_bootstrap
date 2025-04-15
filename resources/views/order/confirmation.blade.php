@extends('layouts.app')

@section('content')
    @php
        $totalPrice = 0;
    @endphp
    <div class="p-3 carts-index">
        <h1 class="h1-border">カート一覧</h1>
        @foreach ($cartItems as $cartItem)
            <div class="d-flex justify-content-center">
                <div class="row g-0 row-border">
                    <div class="col-md-2 col-sm-4 col-6 pr-4 cart-index-text-position">
                        <img src="{{ asset('/storage/images/' . $cartItem->item->image) }}" class="img-fluid">
                    </div>
                    <div class="col-md-3 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>{{ $cartItem->item->item_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>単価:{{ $price = $cartItem->item->price }}円</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>数量:{{ $num = $cartItem->num }}</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>小計:{{ $subtotal = $price * $num }}円</span>
                            @php
                                $totalPrice += $subtotal;
                            @endphp
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6">
                        <div class="carts-index-text-position change-and-deletion-btn">
                            <form class="change-button-pogition pb-1" action="{{ route('items.show', $cartItem->item) }}"
                                method="get">
                                @csrf
                                <button type="submit" class="btn btn-success">数量変更</button>
                            </form>
                            <form class="deletion-button-pogition" action="{{ route('carts.delete', $cartItem->item) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="total-money-position pt-2">
            <span class="total-money">合計金額:{{ $totalPrice }}円</span>
        </div>
        <!-- ユーザー情報記載 -->
        <div class="user-info">
            <span class="info-title-confirmation">
                <h1 class="h1-border">配送先</h1>
            </span>
            <x-user-info :userInfo="$userInfo" /><!-- ユーザー情報の表示(修正(edit)ボタン込み) -->
        </div>
        <form class="row-border order-button-position" action="{{ route('order.complete') }}" method="post">
            @csrf
            {{-- <!-- メインが注文を確定(カート内の商品をorderに登録)する処理だから@method('DELETE')はつけない、これをつけるとカート内やオーダーの削除の意味合いになる --> --}}
            <button type="submit" class="btn btn-info order-button">注文する</button>
        </form>
    </div>
@endsection
