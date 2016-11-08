<?php

use Illuminate\Database\Seeder;

class CenarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cenario')->insert(['titulo' => 'Criação perfil sucesso', 'feature_id' => '1', 'paralelo' => false]);
            DB::table('cenario')->insert(['titulo' => 'Criação perfil ja existe', 'feature_id' => '1', 'paralelo' => false]);
            DB::table('cenario')->insert(['titulo' => 'Criação perfil nome invalido', 'feature_id' => '1', 'paralelo' => false]);
            DB::table('cenario')->insert(['titulo' => 'Criação perfil erro 4', 'feature_id' => '1', 'paralelo' => false]);
            DB::table('cenario')->insert(['titulo' => 'Deleção perfil sucesso', 'feature_id' => '2', 'paralelo' => false]);
            DB::table('cenario')->insert(['titulo' => 'Criação perfil nome invalido', 'feature_id' => '1', 'paralelo' => false]);
            DB::table('cenario')->insert(['titulo' => 'Criação perfil nome invalido', 'feature_id' => '1', 'paralelo' => false]);
    }
}
