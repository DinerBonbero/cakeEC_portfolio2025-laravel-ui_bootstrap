<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{//シーダーはテストレコードの挿入

    public function run(): void
    {
        \App\Models\Cart::factory(10)->create();
    }
}

?>