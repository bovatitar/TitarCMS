<?php

use Illuminate\Database\Seeder;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_item')->insert([
            'id' => 1,
            'name' => "Главная",
            'menu_id' => 1,
            'alias' => "",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('menu_item')->insert([
            'id' => 2,
            'name' => "Новости",
            'menu_id' => 1,
            'alias' => "news",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('menu_item')->insert([
            'id' => 3,
            'name' => "Контакты",
            'menu_id' => 1,
            'alias' => "contacts",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('menu_item')->insert([
            'id' => 4,
            'name' => "Другие",
            'menu_id' => 1,
            'alias' => "other",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
