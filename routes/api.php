<?php

use App\CenarioStep;
use App\Cenario;
use App\Feature;
use App\Services\FeatureBuilder;
use Illuminate\Http\Request;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\Yaml\Yaml;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//$output = shell_exec("cd $behat_config; (MINK_EXTENSION_PARAMS='base_url=$base_root' php $behat_bin -f html $file 2>&1)");

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/test', function (Request $request) {
    $tituloCenario = strtr(utf8_decode($request->get('titulo')), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    $tituloCenario = str_replace(' ', '_', $tituloCenario);

    $basePath = base_path('vendor\behat\behat\bin\behat');
    $fetaurePath = base_path('behat\conpepe\\');

    $cmd = "C:\\laragon\\bin\\php\\php-7.0.12-Win32-VC14-x86\\php.exe {$basePath}" . " --tags @{$tituloCenario} --config {$fetaurePath}behat.yaml --no-snippets";

    $output = shell_exec($cmd);
    echo "<pre>$output</pre>";
});

Route::get('/cenarios/by-feature/{id}', function (Request $request, $id) {
    return \App\Cenario::where('feature_id','=', $id)->with(['steps'])->get();
});

Route::get('/steps', function () {
    return \App\Step::all();
});

Route::delete('/cenarios/{id}', function (Request $request, $id) {

    $cenario = \App\Cenario::find($id);
    if ($cenario == null) {
        return response('Cenario nao encontrado', 404);
    }

    $cenario->delete();
    return response('', 204);
});

Route::post('/cenarios', function (Request $request) {
    //@todo encapsular em transação de banco
    $cenario = Cenario::findOrNew($request->get('id'));
    $cenario->titulo = $request->get('titulo');
    $cenario->paralelo = $request->get('paralelo');
    $cenario->feature_id = $request->get('feature_id');
    $cenario->save();

    CenarioStep::where('cenario_id', '=', $cenario->id)->delete();

    foreach ($request->get('steps') as $step){
        if (key_exists('id', $step['pivot'])){
            CenarioStep::create($step['pivot']);
        }else {
            CenarioStep::create([
                            'valor' => $step['pivot']['valor'],
                            'step_id' => $step['id'],
                            'cenario_id' => $cenario->id
            ]);
        }
    }

    $feature = Feature::find($cenario->feature->id);

    $builder = new FeatureBuilder();
    $builder->build($feature);

    return response('', 201);
});

Route::get('/features/{id?}', function (Request $request, $id) {
    return Feature::find($id);
});

