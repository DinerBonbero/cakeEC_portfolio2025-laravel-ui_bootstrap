@extends('layouts.app')

@section('content')
    <div class="p-3 order-history">
        <h1 class="h1-border">注文履歴</h1>
        @foreach ($orders as $order)
            @php
                $totalPrice = 0;
            @endphp
            <!-- 多次元配列で$orderDetailはキーの配列部分※値はその中にある -->
            <div class="row-border">
                <span class="order-date">{{ $order->order_date }}</span>
            </div>
            @foreach ($order->orderdetails as $orderdetail)
                <!--詳細とitemを繰り返す-->
                <div class="row g-0 row-border-order-history">
                    <div class="col-md-2 col-sm-4 col-6 pr-4 cart-index-text-position">
                        <img src="{{ asset('images/' . $orderdetail->item->image) }}" class="img-fluid">
                    </div>
                    <div class="col-md-3 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>{{ $orderdetail->item->item_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>単価:{{ $price = $orderdetail->item->price }}円</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6">
                        <div class="carts-index-text-position">
                            <span>数量:{{ $num = $orderdetail->num }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-8 col-12">
                        <div class="carts-index-text-position">
                            <span>小計:{{ $subtotal = $price * $num }}円</span>
                            @php
                                $totalPrice += $subtotal;
                            @endphp
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="total-money-position pt-2">
                <span class="total-money">合計金額:{{ $totalPrice }}円</span>
            </div>
        @endforeach
        <div class="p-1 d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection