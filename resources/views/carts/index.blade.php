@extends('layouts.app')

@section('content')
    <div class="p-3 carts-index">
        <h1 class="h1-border">カート一覧</h1>
        @if ($cartItems->isNotEmpty())
            {{-- カートが空ではないとき コレーション用の関数isNotEmpty() --}}
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($cartItems as $cartItem)
                <div class="row g-0 row-border">
                    <div class="col-md-2 col-sm-4 col-4 cart-index-text-position">
                        <img src="{{ asset('images/' . $cartItem->item->image) }}" class="img-fluid">
                    </div>
                    <div class="col-md-3 col-sm-4 col-8">
                        <div class="carts-index-text-position">
                            <span>{{ $cartItem->item->item_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-5">
                        <div class="carts-index-text-position">
                            <span>単価:{{ $price = $cartItem->item->price }}円</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-4 col-7">
                        <div class="carts-index-text-position">
                            <span>数量:{{ $num = $cartItem->num }}</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-5">
                        <div class="carts-index-text-position">
                            <span>小計:{{ $subtotal = $price * $num }}円</span>
                            @php
                                $totalPrice += $subtotal;
                            @endphp
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-7">
                        <div class="carts-index-text-position change-and-deletion-btn">
                            <form class="change-button-pogition pb-1" action="{{ route('items.show', $cartItem->item) }}"
                                method="get">
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
            @endforeach
            <div class="total-money-position pt-2">
                <span class="total-money">合計金額:{{ $totalPrice }}円</span>
            </div>
            <form class="row-border order-button-position" action="{{ route('order.confirmation') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-info order-button">注文する</button>
            </form>
        @else
            <span class="not-item">カートに商品を入れてください</span>
        @endif
    </div>
@endsection
