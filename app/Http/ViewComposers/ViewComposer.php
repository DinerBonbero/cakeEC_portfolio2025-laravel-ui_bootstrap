<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;

class UserInfoComposer
{
    public function compose(View $view)
    {
        //🍀要チェック
        $userInfo = UserInfo::where('user_id', Auth::id())->first();

        if (empty($userInfo)) {
            //🍀Userinfoのレコードが空の時、登録させたい(addページ)
            //登録時はaddに移るべきなのでredirectでaddに移動する。
            //postで/user/infoのURLになっているのに、redirectせずにviewしちゃうと
            //🍀URLが/user/infoのままになってしまう。おかしい

            return redirect()->route('user.info_add');
        }

        $view->with('userInfo', $userInfo);
    }
}
