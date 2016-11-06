<?php

namespace App\Http\Controllers;

use App\Modulo;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CenarioController extends CrudController
{
    public function __construct() {
        parent::__construct();

        $this->crud->setModel("App\Cenario");
        $this->crud->setRoute("admin/cenario");
        $this->crud->setEntityNameStrings('cenario', 'Cenários');

        $this->crud->addColumns(['titulo']);

        $this->crud->addField([
            'name' => 'titulo',
            'label' => 'Título',
            'type' => 'text',
        ]);

    }

    public function index () {
        $this->crud->hasAccessOrFail('list');

        $moduloId = Input::get('modulo');
        try{
            $modulo = Modulo::findOrFail($moduloId);
        }catch (ModelNotFoundException $e){
            throw new NotFoundHttpException('O Modulo buscado não foi encontrado! Retorne para <a href="' . url('admin/dashboard') . '" > Sistema</a>');
        }

        $this->data['modulo'] = $modulo;
        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst($this->crud->entity_name_plural);

        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        return view('cenarios/list', $this->data);
    }

    public function create()
    {
        $this->crud->hasAccessOrFail('create');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('cenarios/create', $this->data);
    }

    public function store(CrudRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(CrudRequest $request)
    {
        return parent::updateCrud();
    }
}
