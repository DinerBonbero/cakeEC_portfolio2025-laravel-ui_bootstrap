<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\UserInfo::factory(10)->create();
    }
}

?>