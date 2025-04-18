@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="row  row-cols-1  row-cols-sm-2 row-cols-md-4 g-4"><!--🍀　「ｇ」=ガター(要素と要素の間のパディング)   　-->
            @foreach ($items as $item)
                <!--🍀 row-cols-2(xs[<576px]で1行にカラム2)  row-cols-md-4(ミディアム以上でカラムが4)-->
                <div class="col"><!--[1row(行)に12col(カラム)で設計されている、col-4で4つ分適用]-->
                    <div class="card index-page">
                        <img src="{{ asset('images/' . $item->image) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item_name }}</h5>
                            <p class="card-text">{{ number_format($item->price, 0, ',') }}円 <br> {{ $item->description }}</p>
                            <a href="{{ route('items.show', $item) }}" class="btn btn-primary">商品詳細</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-5 d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
@endsection