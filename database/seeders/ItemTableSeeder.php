<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(['title' => 'A品牌運動鞋','price' => 3000,'pic' => 'shoe_A.jpg']);
        Item::create(['title' => 'B品牌運動鞋','price' => 2000,'pic' => 'shoe_B.jpg']);
        Item::create(['title' => 'A品牌男褲','price' => 1000,'pic' => 'boy_pants_A.jpg']);
        Item::create(['title' => 'B品牌男褲','price' => 900,'pic' => 'boy_pants_B.jpg']);
        Item::create(['title' => 'A品牌女褲','price' => 1000,'pic' => 'girl_pants_A.jpg']);
        Item::create(['title' => 'B品牌女褲','price' => 900,'pic' => 'girl_pants_B.jpg']);
        Item::create(['title' => 'A品牌男上衣','price' => 800,'pic' => 'boy_T-shirtA.jpg']);
        Item::create(['title' => 'B品牌男上衣','price' => 700,'pic' => 'boy_T-shirtB.jpg']);
        Item::create(['title' => 'A品牌女上衣','price' => 800,'pic' => 'girl_T-shirtA.jpg']);
        Item::create(['title' => 'B品牌女上衣','price' => 700,'pic' => 'girl_T-shirtB.jpg']);
        Item::create(['title' => 'A品牌品牌包','price' => 8000,'pic' => 'bag_A.jpg']);
        Item::create(['title' => 'B品牌品牌包','price' => 7000,'pic' => 'bag_B.jpg']);
        Item::create(['title' => 'A品牌太陽眼鏡','price' => 4000,'pic' => 'glasses_A.jpg']);
        Item::create(['title' => 'B品牌太陽眼鏡','price' => 3000,'pic' => 'glasses_B.jpg']);

    }
}
