<div class="border-parent">
    <div class="row row-border">
        <div class="col-12">
            <span class="info">氏名</span><span>{{ $userInfo->last_name . $userInfo->first_name }}</span>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-12">
            <span class="info">電話番号</span><span>{{ $userInfo->tel }}</span>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-12">
            <span class="info">郵便番号</span><span> {{ $userInfo->postal_code }}</span>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-12">
            <span class="info">住所</span><span>{{ $userInfo->pref . ' ' . $userInfo->city }}</span><br>
            <span class="info-town-position"></span><span>{{ $userInfo->town . ' ' . $userInfo->building }}</span>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-12">
            <span class="info"></span>
            <span>
                <a href="{{ route('user_info.edit') }}" class="btn btn-primary">会員情報修正</a>
            </span>
        </div>
    </div>
</div>
