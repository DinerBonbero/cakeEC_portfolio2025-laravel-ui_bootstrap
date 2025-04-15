@extends('layouts.app')

@section('title', __('再度ログインが必要です'))
@section('content')
    <div class="back-color">
        <h1 class="error-page">419 - セッションの有効期限が切れました</h1>
        <p>再度ログインすることで、操作を続けることができます。</p>
        <a href="{{ route('login') }}">ログインページへ</a>
    </div>
@endsection