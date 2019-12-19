<?php

use Illuminate\Database\Seeder;

class TypeServiceSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_services')->insert([
            'description' => 'Mantenimiento de Cabezales'
        ]);
        DB::table('type_services')->insert([
            'description' => 'Limpieza general'
        ]);
        DB::table('type_services')->insert([
            'description' => 'Reacondicionamiento de Torner'
        ]);
        DB::table('type_services')->insert([
            'description' => 'Reparacion general'
        ]);
        DB::table('type_services')->insert([
            'description' => 'Remplazo de componentes'
        ]);
    }
}
