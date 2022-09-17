<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker=Factory::create();
        for($i=0;$i<5;$i++){
            $category=new Category();
            $category->name=$faker->name;
            $category->type=$faker->name;
            $category->description=$faker->sentence;
            $category->status=1;
            $category->save();
        }
    }
}
