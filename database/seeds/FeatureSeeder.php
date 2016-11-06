<?php

use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature')->insert([
                'titulo' => 'Criação perfis',
                'para_que' => 'Eu crie um perfil novo',
                'como_um' => 'Administrador',
                'eu_devo' => 'Ir na tela abc fazer um rango 1',
                'modulo_id' => '1'
            ]);
        DB::table('feature')->insert([
            'titulo' => 'Deleção de perfis',
            'para_que' => 'Eu delete eum perfil existente',
            'como_um' => 'Administrador',
            'eu_devo' => 'Clicar na tela aqui e ali e la',
            'modulo_id' => '1'
        ]);
        DB::table('feature')->insert([
            'titulo' => 'Solicitar identificação 1º via',
            'para_que' => 'Eu solicite uma primeira via de identificação',
            'como_um' => 'Operador Sidom',
            'eu_devo' => 'Clicar aqui , cadastrar os dados e salvar',
            'modulo_id' => '2'
        ]);
        DB::table('feature')->insert([
            'titulo' => 'Atriuição de perfil',
            'para_que' => 'Eu atribua um perfil existente a um usuario existente',
            'como_um' => 'Administrador',
            'eu_devo' => 'Clicar aqui, selecionar ali e bum!',
            'modulo_id' => '1'
        ]);
    }
}
