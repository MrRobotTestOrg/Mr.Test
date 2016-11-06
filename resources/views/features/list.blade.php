@extends('backpack::layout')

@section('after_styles')
    <link href="{{ asset('css/wizard.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
	    <small>{{ trans('backpack::crud.all') }} <span class="text-lowercase">{{ $crud->entity_name_plural }}</span> {{ trans('backpack::crud.in_the_database') }}.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.list') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header {{ $crud->hasAccess('create')?'with-border':'' }}">

    </div>
    <div class="box-body">
        @include('.features/wizard/index')

    </div><!-- /.box-body -->

    @include('crud::inc.button_stack', ['stack' => 'bottom'])

  </div><!-- /.box -->
@endsection

@section('after_scripts')
	<script src="{{ asset('js/wizard.js') }}" type="text/javascript"></script>


@endsection
