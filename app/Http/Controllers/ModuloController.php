<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\StoreModuloRequest as StoreRequest;
use App\Http\Requests\UpdateModuloRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest;

class ModuloController extends CrudController
{
    public function __construct() {
        parent::__construct();

        $this->crud->setModel("App\Modulo");
        $this->crud->setRoute("admin/modulo");
        $this->crud->setEntityNameStrings('modulo', 'modulos');

        $this->crud->setColumns(['nome']);
        $this->crud->addField([
            'name' => 'nome'
        ]);
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
