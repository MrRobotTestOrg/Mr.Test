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
        DB::table('step')->insert(['nome' => 'Dado que existe um "tabela" com valor']);
        DB::table('step')->insert(['nome' => 'Dado que existem uns "tabela" com valores']);
        DB::table('step')->insert(['nome' => 'Dado Eu estou na página de entrada']);
        DB::table('step')->insert(['nome' => 'Dado Eu estou em ""']);

        DB::table('step')->insert(['nome' => 'Quando espero "seg" segundo']);
        DB::table('step')->insert(['nome' => 'Quando Eu vou para a página de entrada']);
        DB::table('step')->insert(['nome' => 'Quando Eu vou para "pagina"']);
        DB::table('step')->insert(['nome' => 'Quando Eu recarrego a página']);
        DB::table('step')->insert(['nome' => 'Quando Eu voltei uma página']);
        DB::table('step')->insert(['nome' => 'Quando Eu avancei uma página']);
        DB::table('step')->insert(['nome' => 'Quando Eu pressiono "botao"']);
        DB::table('step')->insert(['nome' => 'Quando Eu preencho "valor" para "elemento"']);
        DB::table('step')->insert(['nome' => 'Quando Eu seleciono "option" de "select"']);
        DB::table('step')->insert(['nome' => 'Quando Eu seleciono também "option"" de "select"']);
        DB::table('step')->insert(['nome' => 'Quando Eu marco "option"']);
        DB::table('step')->insert(['nome' => 'Quando Eu desmarco "option"']);
        DB::table('step')->insert(['nome' => 'Quando Eu anexo o arquivo "path"" ao "elemento"']);

        DB::table('step')->insert(['nome' => 'Entao Eu devo estar em "url"']);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver "texto"']);
        DB::table('step')->insert(['nome' => 'Entao Eu não devo ver "text"']);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver o texto que coincide com pattern "padrao"']);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver "texto" no elemento "elemento"']);
        DB::table('step')->insert(['nome' => 'Entao Eu não deveria de ver "texto" no elemento "elemento"']);
        DB::table('step')->insert(['nome' => 'Entao o elemento "elemento" deve conter "valor"']);
        DB::table('step')->insert(['nome' => 'Entao the "elemento" element should not contain "value"']);
        DB::table('step')->insert(['nome' => 'Entao Eu devo ver um elemento "element"']);
        DB::table('step')->insert(['nome' => 'Entao Eu não devo ver um elemento "elemento"']);
        DB::table('step')->insert(['nome' => 'Entao o campo "campo" deve conter "valor"']);
        DB::table('step')->insert(['nome' => 'Entao o campo "campo" não deve conter "valor"']);
        DB::table('step')->insert(['nome' => 'Entao print current URL']);
        DB::table('step')->insert(['nome' => 'Entao imprimir última resposta']);
        DB::table('step')->insert(['nome' => 'Entao mostrar última resposta']);
    }
}
