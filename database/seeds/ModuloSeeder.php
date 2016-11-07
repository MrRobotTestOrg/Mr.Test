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
        
            DB::table('modulo')->insert(['nome' => 'Conpepe', 'caminho_base' => 'http://localhost/conpepe']);
            DB::table('modulo')->insert(['nome' => 'Identificação', 'caminho_base' => 'http://localhost/identificacao']);
            DB::table('modulo')->insert(['nome' => 'Portal', 'caminho_base' => 'http://localhost/portal']);
    }
}
