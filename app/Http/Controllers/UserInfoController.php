<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserInfoRequest;

class UserInfoController extends Controller
{
    public function info()
    { //🍀ナビバーのユーザー情報のボタンを押したとき

        $userInfo = UserInfo::info()->first(); //🍀info()はscopeの認証ユーザーidの該当するuser_idのwhere()

        if (empty($userInfo)) {
            //🍀Userinfoのレコードが空の時、登録させたい(addページ)
            //登録時はaddに移るべきなのでredirectでaddに移動する。
            //postで/user/infoのURLになっているのに、redirectせずにviewしちゃうと
            //🍀URLが/user/infoのままになってしまう。おかしい

            return redirect()->route('user_info.add');
            //userinfoが無ければリダイレクトでinfo_addに遷移
        }

        //var_dump($userInfo);

        return view('users.info', compact('userInfo'));
        //UserInfoが存在していればinfoページを表示します。

    }

    public function infoAdd()
    {
        return view('users.info-add'); //🍀ユーザー情報追加画面
    }

    public function infoStore(UserInfoRequest $request)
    { //ユーザー情報登録のバリデーション

        $validated = $request->validated(); //バリデーションしてOKなら$validatedに、NOならフォームに戻る

        UserInfo::create([//インサート
            'user_id' => Auth::id(),
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'tel' => $validated['tel'],
            'postal_code' => $validated['postal_code'],
            'pref' => $validated['pref'],
            'city' => $validated['city'],
            'town' => $validated['town'],
            'building' => $validated['building']
        ]);

        return redirect()->route('user_info.index'); //バリOKならinfo(情報一覧)へ
    }

    public function infoEdit()
    { //ユーザー情報の編集ページに移動getの(info-edit)

        $userInfo = UserInfo::info()->first();

        if (empty($userInfo)) {
            //Userinfoのレコードが空の時、登録させたい(addページ)
            //登録時はaddに移るべきなのでredirectでaddに移動する。
            //postで/user/infoのURLになっているのに、redirectせずにviewしちゃうと
            //URLが/user/info-editのままになってしまう。おかしい

            return redirect()->route('user_info.add');
            //userinfoが無ければリダイレクトでinfo_addに遷移
        }

        return view('users.info-edit', compact('userInfo'));
    }

    public function infoUpdate(UserInfoRequest $request)
    { //ユーザー情報(user-info)のアップデート処理フォームリクエスト
        
        $validated = $request->validated();

        UserInfo::info()->update([//updateOrCreate()使えるけど今回は使わない
            'user_id' => Auth::id(),
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'tel' => $validated['tel'],
            'postal_code' => $validated['postal_code'],
            'pref' => $validated['pref'],
            'city' => $validated['city'],
            'town' => $validated['town'],
            'building' => $validated['building']
        ]);

        return redirect()->route('user_info.index');
    }
}
