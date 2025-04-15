<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserInfo extends Component
{//component埋め込む共通の部品
    public $userInfo;

    public function __construct($userInfo)
    {
        $this->userInfo = $userInfo;
        
    }

    public function render(): View|Closure|string
    {
        return view('components.user-info');//ここのコンポーネントエディタを使います
    }
}

?>