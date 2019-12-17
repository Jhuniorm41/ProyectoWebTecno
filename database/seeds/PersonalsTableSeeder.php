<?php

use Illuminate\Database\Seeder;

class PersonalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personals')->insert([
            'id' => 3,
            'name' => 'Vinx Guzman',
            'date_admission' => '2019-01-13',
            'position' => 'Jefe de TI',
            'ci' => '112545'
        ]);
    }
}
