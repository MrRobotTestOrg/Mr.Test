<?php

use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step')->insert(['nome' => 'Dados que existe um "tabela" com valor']);
        DB::table('step')->insert(['nome' => 'Dados que existem uns "tabela" com valores']);
        DB::table('step')->insert(['nome' => 'Dados Eu estou na página de entrada']);
        DB::table('step')->insert(['nome' => 'Dados Eu estou em ""']);

        DB::table('step')->insert(['nome' => 'Quando espero "seg" segundo']);
        DB::table('step')->insert(['nome' => 'Quando Eu vou para a página de entrada']);
        DB::table('step')->insert(['nome' => 'Quando Eu vou para ""']);
        DB::table('step')->insert(['nome' => 'Quando Eu recarrego a página']);
        DB::table('step')->insert(['nome' => 'Quando Eu voltei uma página']);
        DB::table('step')->insert(['nome' => 'Quando Eu avancei uma página']);

        DB::table('step')->insert(['nome' => 'Entao print current URL']);
        DB::table('step')->insert(['nome' => 'Entao imprimir última resposta']);
        DB::table('step')->insert(['nome' => 'Entao mostrar última resposta']);
    }
}
