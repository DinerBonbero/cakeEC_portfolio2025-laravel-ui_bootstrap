@extends('layouts.app')

@section('title', __('ログインが必要です'))
@section('content')
    <div class="back-color">
        <h1 class="error-page">認証が必要です</h1>
        <p>このページにアクセスするには、ログインが必要です。</p>
        <a href="{{ route('login') }}">ログインページへ</a>
    </div>
@endsection
