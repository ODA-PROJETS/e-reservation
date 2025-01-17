<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UsersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Users::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('users', 'users');
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
        $this->crud->addColumn([
            'name' => 'email',
            'label' => "email",
            'type' => 'email'
        ]);
        $this->crud->addColumn([
            'name' => 'is_admin',
            'label' => "administrateur ? ",
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
        CRUD::setValidation(UsersRequest::class);

        $this->crud->addField([
            'name' => 'name', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'email',
            'label' => "email",
            'type' => 'email'
        ]);

        $this->crud->addField([
            'name' => 'password', // The db column name
            'label' => "mot de passe", // Table column heading
            'type' => 'password'
        ]);

        $this->crud->addField([
            'name' => 'is_admin', // The db column name
            'label' => "administrateur", // Table column heading
            'type' => 'boolean'
        ]);

        if (request()->input('password')) {
            request()->request->set('password', Hash::make(request()->input('password')));
        } else {
            request()->request->remove('password');
        }
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
