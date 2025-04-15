<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\UserInfo;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
//「🍀使用したテストコード
//       $users = User::factory(2)->create();//🍀マスター主テーブル(参照先のない)
//       $items = Item::factory(8)->create();//🍀マスター主テーブル(参照先のない)
//
//       UserInfo::factory(2)->recycle($users)->create();//🍀recycle()作成したモデルファクトリidの使い回し
//
//       $orders = Order::factory(5)->recycle($users)->create();
//
//       Cart::factory(5)->recycle($users)->recycle($items)->create();
//
//       OrderDetail::factory(5)->recycle($items)->recycle($orders)->create();
//」

//「　
    //🍀デフォルト
       //User::factory(10)->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
//」

//「
//　🍀　削除用コード
        //\App\Models\User::truncate();
        //\App\Models\Cart::truncate();
        //\App\Models\Item::truncate();
        //\App\Models\Order::truncate();
        //\App\Models\OrderDetail::truncate();
        //\App\Models\UserInfo::truncate();
//」

//「
//　🍀　シーダーの呼び出し
        //$this->call([
        //    CartSeeder::class,
        //    //ItemSeeder::class,
        //    OrderDetailSeeder::class,
        //    //OrderSeeder::class,
        //    UserInfoSeeder::class
        //]);
//」
    }
}

?>