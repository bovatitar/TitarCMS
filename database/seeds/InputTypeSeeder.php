<?php

use Illuminate\Database\Seeder;

class InputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('input_type')->insert([
            "id" => 1,
            'name' => "calendar",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('input_type_parameter')->insert([
            "input_type" => 1,
            'name' => "name",
            'descriprion' => "name_of_input",
            'required' => true,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('input_type_parameter')->insert([
            "input_type" => 1,
            'name' => "label",
            'descriprion' => "label_of_input",
            'required' => true,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('input_type_parameter')->insert([
            "input_type" => 1,
            'name' => "default",
            'descriprion' => "default_value_of_input",
            'required' => true,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);


        DB::table('input_type')->insert([
            'name' => "category",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('input_type')->insert([
            'name' => "checkbox",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
