<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\Item::factory(10)->create();
    }
}

?>