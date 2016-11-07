<?php
/**
 * Created by PhpStorm.
 * User: Muniz
 * Date: 07/11/2016
 * Time: 00:06
 */

namespace App\Services;


class FeatureBuilder
{
    private $template = "#language: pt
Funcionalidade: teste

";

    private function bind($replacements, $template)
    {
        return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements)
        {
            return $replacements[$matches[1]];
        }, $template);
    }

    public function build ($feature) {

        foreach ($feature->cenarios as $cenario){
            $this->template .= '@javascript ' . "\n";
            $this->template .= 'Cenário: ' .$cenario->titulo . "\n";
            foreach ($cenario->steps as $step){
                $this->template .= '  ' .$step->pivot->valor . "\n";
            }

            $this->template .= "\n";

        }

        $dados = $this->bind([], $this->template);

        file_put_contents(storage_path('google.feature'), $dados);
    }
}