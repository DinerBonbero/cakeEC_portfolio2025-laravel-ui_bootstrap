@extends('layouts.app')

@section('content')
    @php
        $prefectures = config('prefectures');
    @endphp

    <div class="info-add-position p-2">
        <h1 class="info-add-h1">会員情報登録</h1>
        <form action="{{ route('user_info.store') }}" method="post">
            @csrf
            <div class="row g-2">
                <div class="col-3 col-sm-2">
                    <span>必須</span>
                    <label for="inputLastname" class="col-form-label">姓</label>
                </div>
                <div class="col-9 col-sm-4">
                    <input type="text" name="last_name" id="inputLastname"
                        class="form-control @error('last_name') is-invalid @enderror" placeholder="苺野"
                        value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-3 col-sm-2">
                    <span>必須</span>
                    <label for="inputFirstName" class="col-form-label">名</label>
                </div>
                <div class="col-9 col-sm-4">
                    <input type="text" name="first_name" id="inputFirstName"
                        class="form-control @error('first_name') is-invalid @enderror" placeholder="慶希"
                        value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row pt-2 g-2">
                <div class="col-12 col-sm-6">
                    <span>必須</span>
                    <label for="inputTel" class="col-form-label">電話番号</label>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="tel" name="tel" id="inputTel"
                        class="form-control @error('tel') is-invalid @enderror" placeholder="090-0000-0000"
                        value="{{ old('tel') }}" maxlength="13">
                    @error('tel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row pt-2 g-2">
                <div class="col-12 col-sm-6">
                    <span>必須</span>
                    <label for="inputPostalCode" class="col-form-label">郵便番号</label>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="text" name="postal_code" id="inputPostalCode"
                        class="form-control @error('postal_code') is-invalid @enderror" placeholder="396-1581"
                        value="{{ old('postal_code') }}">
                    @error('postal_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row pt-2 g-2">
                <div class="col-12 col-sm-6">
                    <span>必須</span>
                    <label class="col-form-label" for="selectPrefecture">都道府県</label>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-select @error('pref') is-invalid @enderror" id="selectPrefecture" name="pref">
                        <option value="">選択してください</option>
                        @foreach ($prefectures as $prefecture)
                            <option value="{{ $prefecture }}" @if (old('pref') == $prefecture) selected @endif>
                                {{ $prefecture }}</option>
                        @endforeach
                    </select>
                    @error('pref')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row pt-2 g-2">
                <div class="col-12 col-sm-6">
                    <span>必須</span>
                    <label for="inputCity" class="col-form-label">市区</label>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="text" name="city" id="inputCity"
                        class="form-control @error('city') is-invalid @enderror" placeholder="大阪市阿倍野区"
                        value="{{ old('city') }}">
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row pt-2 g-2">
                <div class="col-12 col-sm-6">
                    <span>必須</span>
                    <label for="inputTown" class="col-form-label">町名番地</label>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="text" name="town" id="inputTown"
                        class="form-control @error('town') is-invalid @enderror" placeholder="お菓子町2-1-1"
                        value="{{ old('town') }}">
                    @error('town')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row pt-2 g-2">
                <div class="col-12 col-sm-6">
                    <label for="inputBuilding" class="col-form-label">建物等</label>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="text" name="building" id="inputBuilding" class="form-control" placeholder="あまあまハイツ"
                        value="{{ old('building') }}">
                    @error('building')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div>
                <div class="pt-2">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </div>
        </form>
    </div>
@endsection