@extends('layouts.app')

@section('content')
    <div class="user-info">
        <span class="info-title">
            <h1 class="h1-border">会員情報</h1>
        </span>
        <x-user-info :userInfo="$userInfo" />
    </div>
@endsection
