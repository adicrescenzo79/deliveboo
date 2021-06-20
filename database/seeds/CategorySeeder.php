<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('categories');

        foreach ($categories as $category) {
          $newCategory = new Category();
          $newCategory->name = $category['name'];
          $newCategory->icon = $category['icon'];
          $newCategory->save();
       }

    }

}
