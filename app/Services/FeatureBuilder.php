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
    private $template = "";

    private function bind($replacements, $template)
    {
        return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements)
        {
            return $replacements[$matches[1]];
        }, $template);
    }

    public function build ($feature) {
        $this->template = "#language: pt \r\nFuncionalidade: {$feature->titulo} \r\n\r\n";

        $this->template .= "Para que {$feature->para_que}" . "\r\n";
        $this->template .= "Como um {$feature->como_um}" . "\r\n";
        $this->template .= "Eu devo  {$feature->eu_devo}" . "\r\n \r\n";

        foreach ($feature->cenarios as $cenario){
            $titulo = $this->removeAcentos($cenario->titulo);
            $cenario->paralelo ? $this->template .= '@parallel-scenario ' . "\r\n" : '';
            $this->template .= '@javascript ' . "\r\n";
            $this->template .= '@' . '' . str_replace(' ', '_', $titulo) . "\r\n";
            $this->template .= 'Cenário: ' .$cenario->titulo . "\r\n";
            foreach ($cenario->steps as $step){
                $this->template .= '  ' .$step->pivot->valor . "\r\n";
            }

            $this->template .= "\r\n";

        }

        $dados = $this->bind([], $this->template);

        $nomeModulo = $this->removeAcentos($feature->modulo->nome);
        $titulo = strtr(utf8_decode($feature->titulo), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
        $titulo = str_replace(' ', '_', $titulo);


        file_put_contents(base_path("behat/{$nomeModulo}/features/{$titulo}.feature"), $dados);
    }

    /**
     * @param $feature
     * @return string
     */
    public function removeAcentos($valor)
    {
        $valor = strtr(utf8_decode($valor), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
        return $valor;
    }
}