<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{

    public function run(): void
    {
        //\App\Models\Item::factory(10)->create(); ファクトリー指定
        $items = [
            ['item_name' => 'ラズベリーのマカロン', 'description' => '沢山のフレッシュなラズベリー使用した高級マカロンです。', 'price' => '900', 'image' => 'macarons.jpg'],
            ['item_name' => 'チョコレートケーキ', 'description' => 'ほろ苦いチョコレートをあしらった、大人のケーキです。', 'price' => '580', 'image' => 'choco-cake.jpg'],
            ['item_name' => 'フルーツケーキ', 'description' => '季節のフルーツを使用した美味しいケーキです。', 'price' => '3400', 'image' => 'fruits-cake.jpg'],
            ['item_name' => 'バナナのマフィン', 'description' => 'バナナをふんだんに使用し、鮮やかなベリーを添えました。', 'price' => '480', 'image' => 'banana-muffin.jpg'],
            ['item_name' => 'チョコチップ', 'description' => 'チョコチップをたくさん練りこんだリッチな生地のカップケーキです。', 'price' => '380', 'image' => 'chocochip-cupcake.jpg'],
            ['item_name' => 'スパークリングキッス', 'description' => '口の中で弾けるクリームをチョコレートでコーティングしました。', 'price' => '230', 'image' => 'sparkling-kiss.jpg'],
            ['item_name' => 'チョコレートトリュフ', 'description' => 'うまい苦みのある大人のトリュフです。', 'price' => '200', 'image' => 'chocolate-truffle.jpg'],
            ['item_name' => 'カラフルマカロン', 'description' => '4種(ピスタチオ、シトロン、カカオ、苺)のマカロンです、ねっちり感のない、さっくりした生地です。', 'price' => '650', 'image' => 'colorful-macaroons.jpg'],
            ['item_name' => 'コーヒーカップケーキ', 'description' => 'ブルーマウンテンを使ったカップケーキです。', 'price' => '480', 'image' => 'coffee-cupcake.jpg'],
            ['item_name' => '生チョコケーキ', 'description' => 'リッチな生チョコを贅沢に使った、甘すぎないかつ苦みのある上品なチョコレートケーキです。', 'price' => '650', 'image' => 'raw_chocolate-cake.jpg'],
            ['item_name' => 'いちごのエクレア', 'description' => 'フレッシュな苺と生クリームで幸せを感じます。', 'price' => '580', 'image' => 'strawberry-eclair.jpg'],
            ['item_name' => 'オレンジケーキ', 'description' => '生地にオレンジの洋酒と皮を練り込み、チョコレートをコーティングしました。しっとり食感と香り高いオレンジのケーキです。', 'price' => '400', 'image' => 'orange-cake.jpg'],
            ['item_name' => 'ベリーのタルト', 'description' => '様々なベリーを使ったさっぱりしたタルトです。', 'price' => '2800', 'image' => 'berry-tarte.jpg'],
            ['item_name' => 'いちごソースケーキ', 'description' => 'いちごのソースと果肉をたくさん使った豪快なケーキです。', 'price' => '620', 'image' => 'strawberry_source-cake.jpg'],
            ['item_name' => 'さくらんぼのケーキ', 'description' => '季節のさくらんぼを入れた飾らないケーキです。', 'price' => '450', 'image' => 'cherry-cake.jpg'],
            ['item_name' => 'ショコラティーヌ', 'description' => '甘味・苦み・酸味それぞれの個性を持つ、3種類のチョコレートを使った贅沢なチョコレートケーキ', 'price' => '550', 'image' => 'chicolatina.jpg'],
            ['item_name' => 'チーズケーキ', 'description' => 'フランス直輸入のチーズを使ったしっとりとしたチーズケーキです。', 'price' => '600', 'image' => 'cheesecake.jpg'],
            ['item_name' => 'クリーム・パフ', 'description' => 'サクッとした食感の生地と、甘すぎない濃い卵黄のカスタードのシュークリームです。', 'price' => '250', 'image' => 'cream-puff.jpg'],
            ['item_name' => 'ベリーチーズケーキ', 'description' => '3種類のベリーとさくらんぼのあっさりとしたチーズケーキです。', 'price' => '2300', 'image' => 'berry-cheese-cakes.jpg'],
            ['item_name' => 'フィラデルフィア', 'description' => 'フィラデルフィアチーズを使ったフレッシュなチーズケーキです。', 'price' => '3500', 'image' => 'philadelphia.jpg'],
            ['item_name' => 'いちごのケーキ', 'description' => 'フレッシュなとれたていちごをたくさん詰め込んだ王道のケーキです。', 'price' => '3700', 'image' => 'strawberry-cake.jpg']
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}

?>