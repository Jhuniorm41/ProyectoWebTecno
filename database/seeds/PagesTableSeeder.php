<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'cu' => "CU1: Gestionar Usuario"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU2: Gestionar Productos"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU3: Gestionar Servicio de Mantenimiento"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU4: Gestionar Garantia"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU5: Gestionar Reserva"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU6: Gestionar Cotizaciones"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU7: Gestionar Promociones"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU8: Reportes y Estadisticas"
        ]);

    }
}
