<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest;

class FeatureController extends CrudController
{
    public function __construct() {
        parent::__construct();

        $this->crud->setModel("App\Feature");
        $this->crud->setRoute("admin/feature");
        $this->crud->setEntityNameStrings('funcionalidade', 'Funcionalidades');

        $this->crud->addColumns(['titulo', 'para_que', 'como_um', 'eu_devo', 'modulo']);
        $this->crud->setColumnDetails('modulo', [
            'type' => 'array',
            'display_field' => 'nome'
        ]);


        $this->crud->addField([
            'name' => 'titulo',
            'label' => 'Título',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'para_que',
            'label' => 'Para que',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'como_um',
            'label' => 'Como um',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'eu_devo',
            'label' => 'Eu devo',
            'type' => 'text',
        ]);
        $this->crud->addField(
            [  'label' => "Modulo",
                'type' => 'select',
                'name' => 'modulo_id', // the db column for the foreign key
                'entity' => 'modulo', // the method that defines the relationship in your Model
                'attribute' => 'nome', // foreign key attribute that is shown to user
                'model' => "App\Modulo" // foreign key model
            ]
           );

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
;