<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->comment('商品名');
            $table->string('description')->comment('商品説明');
            $table->integer('price')->comment('値段'); //最大8ケタ、小数点以下2ケタ
            $table->string('image')->comment('画像名');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

?>