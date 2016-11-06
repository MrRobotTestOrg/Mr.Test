@extends('backpack::layout')

@section('after_styles')
    <link href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/cenarios.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('header')

    <section class="content-header">
        <h1>
            <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
            <small> para o modulo <strong class="text-red text-uppercase">{{$modulo->nome}}</strong>.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
            <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
            <li class="active">{{ trans('backpack::crud.list') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row container" id="app">
        <div class="col col-md-4">
            <div class="row">
                <div class="form-group">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Escolha a funcionalidade</h3>
                        </div>
                        <div class="box-body">
                            <select name="features" id="select-feature" class="form-control" v-model="selectFeature">
                                @foreach(\App\Feature::where('modulo_id','=',$modulo->id)->get() as $feature)
                                    <option value="{{$feature->id}}">{{$feature->titulo}}</option>
                                @endforeach
                            </select>
                            <div v-show="featureEscolhida.para_que" class="">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong class="text-red col col-md-4">Para que</strong> @{{featureEscolhida.para_que}}
                                    </li>
                                    <li class="list-group-item">
                                        <strong class="text-red col col-md-4">Como um</strong> @{{featureEscolhida.como_um}}
                                    </li>
                                    <li class="list-group-item">
                                        <strong class="text-red col col-md-4">Eu devo</strong> @{{featureEscolhida.eu_devo}}
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Background</h3>
                        </div>
                        <div class="box-body">
                            <ul>
                                {{--<li>Cen1</li>
                                <li>Cen2</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cenários</h3>
                        </div>
                        <div class="box-body">
                            <ul class="list-group">
                                <li class="list-group-item" v-for="cenario in cenarios"
                                @click="buscaCenario(cenario)" v-bind:class="cenario.id === cenarioEscolhido.id ? 'active' : ''">
                                @{{cenario.titulo}}
                                </li>

                            </ul>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary ladda-button" data-style="zoom-in" @click="criarCenario">
                            <span class="ladda-label">
                                    <i class="fa fa-save"></i> Criar novo cenário
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-md-8">
            <div class="form-group">
                <div class="box" v-show="cenarioEscolhido.titulo">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cenário : <input class="text-red input-step " v-model="cenarioEscolhido.titulo" /></h3>
                    </div>
                    <div class="box-body">
                        <fieldset >
                            <legend>Pré condições</legend>
                            <div class="container" v-if="cenarioEscolhido">
                                <div class="row" v-for="step in filtroPre">
                                    <div class="col col-md-6">
                                        <input type="text" class="input-step form-control" v-model="step.pivot.valor">
                                    </div>
                                    <div class="col col-md-2">
                                        <button class="btn btn-danger" @click="remover(step)">
                                        <i class="fa fa-eraser" aria-hidden="true" ></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <select name="step-acoes" id="step-acoes" class="form-control" v-model="novoStepPreId">
                                            <option v-bind:value="step.id" v-for="step in filtroPreOptions">@{{step.nome}}</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-2">
                                        <button class="btn btn-primary" @click="adicionarStepPre()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset >
                            <legend>Ações</legend>
                            <div class="container" v-if="cenarioEscolhido">
                                <div class="row" v-for="step in filtroAcoes">
                                    <div class="col col-md-6">
                                        <input type="text" class="input-step form-control" v-model="step.pivot.valor">

                                    </div>
                                    <div class="col col-md-2">
                                        <button class="btn btn-danger" @click="remover(step)">
                                        <i class="fa fa-eraser" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <select name="step-acoes" id="step-acoes" class="form-control" v-model="novoStepAcaoId">
                                            <option v-bind:value="step.id" v-for="step in filtroAcoesOptions">@{{step.nome}}</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-2">
                                        <button class="btn btn-primary" @click="adicionarStepAcao()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset >
                            <legend>Resultado esperado</legend>
                            <div class="container" v-if="cenarioEscolhido">
                                <div class="row" v-for="step in filtroResultado">
                                    <div class="col col-md-6">
                                        <input type="text" class="input-step form-control" v-model="step.pivot.valor">

                                    </div>
                                    <div class="col col-md-2">
                                        <button class="btn btn-danger" @click="remover(step)">
                                        <i class="fa fa-eraser" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <select name="step-acoes" id="step-acoes" class="form-control" v-model="novoStepResultadoId">
                                            <option v-bind:value="step.id" v-for="step in filtroResultadoOptions" >@{{step.nome}}</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-2">
                                        <button class="btn btn-primary" @click="adicionarStepResultado()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger ladda-button" data-style="zoom-in" @click="deletarCenario">
                        <span class="ladda-label">
                            <i class="fa fa-save"></i> Deletar este cenário
                        </span>
                        </button>
                        <button type="submit" class="btn btn-primary ladda-button" data-style="zoom-in" @click="salvarCenario">
                        <span class="ladda-label">
                                <i class="fa fa-save"></i> Salvar este cenário
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after_scripts')
    <script src="{{ asset('/js/vue.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/vue-resource.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/vue-cenario.js') }}" type="text/javascript"></script>
@endsection
