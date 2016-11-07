<?php

use Illuminate\Database\Seeder;

class CenarioStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cenario_step')->insert([ 'valor' => 'Dados que existe um "militar" com valor', 'cenario_id' => '1','step_id' => '1']);
        DB::table('cenario_step')->insert([ 'valor' => 'Quando espero "1" segundo', 'cenario_id' => '1','step_id' => '5']);
        DB::table('cenario_step')->insert([ 'valor' => 'Quando Eu pressiono "botao"', 'cenario_id' => '1','step_id' => '11']);
        DB::table('cenario_step')->insert([ 'valor' => 'Quando Eu preencho "valor" para "elemento"', 'cenario_id' => '1','step_id' => '12']);

    }
}
