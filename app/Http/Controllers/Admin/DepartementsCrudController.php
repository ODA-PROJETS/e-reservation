<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartementsRequest;
use App\Models\Users;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DepartementsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DepartementsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Departements::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/departements');
        CRUD::setEntityNameStrings('departements', 'departements');
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
            'name' => 'name', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'user_id',
            'type' => 'select',
            'label' => "Responsable",
            'entity' => 'user',
            'attribute' => 'name',
            'model' => Users::class,
        ]);

        $this->crud->addColumn([
            'name' => 'description', // The db column name
            'label' => "description", // Table column heading
            'type' => 'text'
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
        CRUD::setValidation(DepartementsRequest::class);

        $this->crud->addField([
            'name' => 'user_id',
            'type' => 'select2',
            'label' => "Responsable",
            'entity' => 'user',
            'attribute' => 'name',
            'model' => Users::class,
        ]);

        $this->crud->addField([
            'name' => 'name', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'description', // The db column name
            'label' => "description", // Table column heading
            'type' => 'textarea'
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
