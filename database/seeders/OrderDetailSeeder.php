<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Database\Factories\OrderDetailFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    
    public function run(): void
    {
        //\App\Models\OrderDetail::factory(10)->create();
        
        //$orders = Order::factory(2)->create();
        //OrderDetail::factory(10)->recycle($orders)->create();
    }
}

?>