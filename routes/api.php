<?php

use App\CenarioStep;
use App\Cenario;
use Illuminate\Http\Request;
use Symfony\Component\Debug\Exception\FatalThrowableError;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


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
    return response('', 201);
});

Route::get('/features/{id?}', function (Request $request, $id) {
    return \App\Feature::find($id);
});

