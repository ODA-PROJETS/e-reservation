<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SallesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SallesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SallesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Salles::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/salles');
        CRUD::setEntityNameStrings('salles', 'salles');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name',
            'label' => "nom",
            'type' => 'text'
        ]);
        // $this->crud->addColumn([
        //     'name' => 'level',
        //     'label' => "niveau",
        //     'type' => 'number'
        // ]);
        $this->crud->addColumn([
            'name' => 'nbre_place',
            'label' => "Nombre de place",
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => "Description",
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'user_id',
            'type' => 'select',
            'label' => "Validateurs",
            'entity' => 'user',
            'attribute' => 'name',
            'model' => Users::class,
            'pivot' => true,
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => "disponible ?",
            'default' => true,
            'type' => 'boolean'
        ]);


    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SallesRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => "nom",
            'type' => 'text'
        ]);
        // $this->crud->addField([
        //     'name' => 'level',
        //     'label' => "niveau",
        //     'type' => 'number'
        // ]);
        $this->crud->addField([
            'name' => 'nbre_place',
            'label' => "Nombre de place",
            'type' => 'number'
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => "description de la salle",
            'type' => 'textarea'
        ]);
        $this->crud->addField([
            'name' => 'image',
            'label' => "image",
            'type'  => 'upload',
                'upload' => true,
        ]);
        $this->crud->addField([
            'name' => 'user',
            'type' => 'select2_multiple',
            'label' => "Validateurs",
            'entity' => 'user',
            'attribute' => 'name',
            'pivot' => true,
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => "disponible",
            'type' => 'boolean'
        ]);

   }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
