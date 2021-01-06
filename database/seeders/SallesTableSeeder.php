<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SallesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('salles')->delete();
        
        \DB::table('salles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'salle1',
                'description' => 'equipement imac haute technologie',
                'level' => 1,
                'status' => 1,
                'nbre_place' => 15,
                'image' => NULL,
                'created_at' => '2020-12-23 14:15:26',
                'updated_at' => '2020-12-23 14:15:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'salle 2',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 1,
                'nbre_place' => 20,
                'image' => NULL,
                'created_at' => '2020-12-23 14:16:51',
                'updated_at' => '2020-12-23 14:16:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'salle 3',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 0,
                'nbre_place' => 22,
                'image' => NULL,
                'created_at' => '2020-12-23 14:17:52',
                'updated_at' => '2020-12-23 14:17:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'salle 4',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 1,
                'nbre_place' => 50,
                'image' => NULL,
                'created_at' => '2020-12-23 14:18:25',
                'updated_at' => '2020-12-23 14:18:25',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'salle 5',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 1,
                'nbre_place' => 10,
                'image' => NULL,
                'created_at' => '2020-12-23 14:18:59',
                'updated_at' => '2020-12-23 14:18:59',
            ),
        ));
        
        
    }
}