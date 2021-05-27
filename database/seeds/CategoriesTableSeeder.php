<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
        [ 'name' => 'dog'],
        [ 'name' => 'cat'],
        [ 'name' => 'hamster'],
        [ 'name' => 'rabbit'],
        [ 'name' => 'bird'],
        [ 'name' => 'fish' ],
        [ 'name' => 'reptiles' ],
        ]);
    }
}
