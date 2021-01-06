<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservationsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReservationsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReservationsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Reservations::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reservations');
        CRUD::setEntityNameStrings('reservations', 'reservations');
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
            'name' => 'salle_id',
            'type' => 'select',
            'label' => "Salle",
            'entity' => 'salle',
            'attribute' => 'name',
            'model' => Salles::class,
        ]);

        $this->crud->addColumn([
            'name' => 'departement_id',
            'type' => 'select',
            'label' => "departement",
            'entity' => 'departement',
            'attribute' => 'name',
            'model' => Departements::class,
        ]);
        $this->crud->addColumn([
            'name' => 'date_start',
            'label' => "date debut",
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'hour_start',
            'label' => "heure debut",
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'date_end',
            'label' => "date fin",
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'hour_end',
            'label' => "heure fin",
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'hour_end',
            'label' => "heure fin",
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'status_id',
            'type' => 'select',
            'label' => "Status",
            'entity' => 'status',
            'attribute' => 'name',
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
        CRUD::setValidation(ReservationsRequest::class);

        $this->crud->addField([
            'name' => 'salle_id',
            'type' => 'select2',
            'label' => "Salle",
            'entity' => 'salle',
            'attribute' => 'name',
        ]);

        $this->crud->addField([
            'name' => 'departement_id',
            'type' => 'select2',
            'label' => "departement",
            'entity' => 'departement',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'name' => 'date_start',
            'label' => "date de debut",
            'type' => 'date'
        ]);

        $this->crud->addField([
            'name' => 'hour_start',
            'label' => "heure de debut",
            'type' => 'time'
        ]);

        $this->crud->addField([
            'name' => 'date_end',
            'label' => "date de fin",
            'type' => 'date'
        ]);

        $this->crud->addField([
            'name' => 'hour_end',
            'label' => "heure de fin",
            'type' => 'time'
        ]);

        $this->crud->addField([
            'name' => 'hour_end',
            'label' => "heure de fin",
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'status_id',
            'type' => 'select2',
            'label' => "Status",
            'entity' => 'status',
            'attribute' => 'name',
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
