<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'news',
            'cooking',
            'travels',
            'music',
            'art',
            'cinema'
        ];

        foreach($categories as $category) {
            $category_obj = new Category();
            $category_obj->name = $category;
            $category_obj->slug = Str::slug($category, '-');
            $category_obj->save();
        }
    }
}