<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => '女子限定'],
            ['category_name' => '男性限定'],
            ['category_name' => '趣味'],
            ['category_name' => 'スポーツ'],
            ['category_name' => 'ビジネス'],
            ['category_name' => 'その他'],
        ]);
    }
}
