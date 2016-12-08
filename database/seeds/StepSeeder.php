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
        DB::table('step')->insert(['nome' => 'Dado que existe um "tabela" com valor', 'tipo' => 1]);
        DB::table('step')->insert(['nome' => 'Dado que existem uns "tabela" com valores', 'tipo' => 1]);
        DB::table('step')->insert(['nome' => 'Dado Eu estou na página de entrada', 'tipo' => 1]);
        DB::table('step')->insert(['nome' => 'Dado Eu estou em ""', 'tipo' => 1]);

        DB::table('step')->insert(['nome' => 'Quando espero "seg" segundo', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu vou para a página de entrada', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu vou para "pagina"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu recarrego a página', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu voltei uma página', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu avancei uma página', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu pressiono "botao"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu preencho "valor" para "elemento"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu seleciono "option" de "select"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu seleciono também "option"" de "select"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu marco "option"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu desmarco "option"', 'tipo' => 2]);
        DB::table('step')->insert(['nome' => 'Quando Eu anexo o arquivo "path"" ao "elemento"', 'tipo' => 2]);

        DB::table('step')->insert(['nome' => 'Entao Eu devo estar em "url"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver "texto"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu não devo ver "text"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver o texto que coincide com pattern "padrao"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver "texto" no elemento "elemento"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu não deveria de ver "texto" no elemento "elemento"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao o elemento "elemento" deve conter "valor"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao the "elemento" element should not contain "value"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver um elemento "element"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao Eu não devo ver um elemento "elemento"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao o campo "campo" deve conter "valor"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao o campo "campo" não deve conter "valor"', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao print current URL', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao imprimir última resposta', 'tipo' => 3]);
        DB::table('step')->insert(['nome' => 'Entao mostrar última resposta', 'tipo' => 3]);
    }
}
