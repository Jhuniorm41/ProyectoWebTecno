<?php

use Illuminate\Database\Seeder;

class TypeProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_products')->insert([
            'description' => 'impresora'
        ]);
        DB::table('type_products')->insert([
            'description' => 'plotter'
        ]);
        DB::table('type_products')->insert([
            'description' => 'tonner'
        ]);
        DB::table('type_products')->insert([
            'description' => 'cartucho'
        ]);
        DB::table('type_products')->insert([
            'description' => 'mouse'
        ]);
        DB::table('type_products')->insert([
            'description' => 'monitor'
        ]);

    }
}
