<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=['%','flat'];
        $faker=Factory::create();
        for($i=0;$i<30;$i++){
            $product=new Product();
            $product->name=$faker->name;
            $product->description=$faker->sentence;
            $product->buy_price=rand(50,1000);
            $product->discount=rand(50,100);
            $product->discount_type=$types[rand(0,1)];
            $product->sell_price=rand(50,1000);
            $product->status=1;
            $product->category_id=Category::inRandomOrder()->first()->id;
            $product->save();
            
        }

        
    }
}
