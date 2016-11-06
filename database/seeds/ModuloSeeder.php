<?php

use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('modulo')->insert(['nome' => 'Conpepe']);
            DB::table('modulo')->insert(['nome' => 'Identificação']);
            DB::table('modulo')->insert(['nome' => 'Portal']);
    }
}
