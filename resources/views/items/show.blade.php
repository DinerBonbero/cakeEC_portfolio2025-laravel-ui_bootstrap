@extends('layouts.app')

@section('content')
    <div class="card show-page">
        <img src="{{ asset('images/' . $item->image) }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $item->item_name }}</h5>
            <p class="card-text">{{ number_format($item->price, 0, ',') }}円 <br> {{ $item->description }}</p>
            <form action="{{ route('carts.create_And_Store', $item) }}" method="post">
                @csrf
                <div class="row g-1">
                    <div class="col-auto">
                        <label for="itemQuantity" class="form-label item-number">数量：</label>
                    </div>
                    <div class="@error('item_Quantity') col-3 @else col-2 @enderror">
                        <input type="number" min="1" max="10"
                            class="form-control  @error('item_Quantity') is-invalid @enderror" id="itemQuantity"
                            name="item_Quantity" value="{{ old('item_Quantity', $itemNum) }}">
                        @error('item_Quantity')
                            <div class="invalid-feedback show-valid-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">カートに入れる</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
