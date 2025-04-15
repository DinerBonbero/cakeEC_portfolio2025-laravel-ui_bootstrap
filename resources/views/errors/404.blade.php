@extends('layouts.app')

@section('title', __('ページが見つかりません'))
@section('content')
    <div class="back-color">
        <h1 class="error-page">404 - お探しのページは見つかりません</h1>
        <p>申し訳ありませんが、ページが移動したか、削除された可能性があります。</p>
        <a href="{{ url('items') }}">ホームに戻る</a>
    </div>
@endsection