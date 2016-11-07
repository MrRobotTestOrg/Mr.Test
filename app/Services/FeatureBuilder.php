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

@parallel-scenario
@javascript
Cenário: {{titulo}}
";

    private function bind($replacements, $template)
    {
        return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements)
        {
            return $replacements[$matches[1]];
        }, $template);
    }

    public function build ($feature) {

        foreach ($feature->steps()->get() as $step){
            $this->template .= '  ' .$step->pivot->valor . "\n";
        }
        $banco = [
            'titulo' => $feature->titulo
        ];
        $dados = $this->bind($banco, $this->template);

        file_put_contents(storage_path('google.feature'), $dados);
    }
}