<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_infos', function (Blueprint $table) {//マイグレーションはデータベースの定義
            $table->id(); //bigIncrementsの別名、自動増分するUNSIGNED BIGINT(主キー)カラムを作成します
            $table->bigInteger('user_id')->comment('ユーザーID');
            $table->string('last_name')->comment('姓');
            $table->string('first_name')->comment('名');
            $table->string('tel')->comment('電話番号');
            $table->string('postal_code')->comment('郵便番号');
            $table->string('pref')->comment('都道府県');
            $table->string('city')->comment('市区町村');
            $table->string('town')->comment('町名番地');
            $table->string('building')->nullable('建物等');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};

?>