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
                'image' => 'salles/3fd642693bf3aa146dabb3c7f743e553.jpeg',
                'created_at' => '2020-12-23 14:15:26',
                'updated_at' => '2021-01-07 14:19:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'salle 2',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 1,
                'nbre_place' => 20,
                'image' => 'salles/6ede0e8ebf74bfbd284623912b7deadd.jpeg',
                'created_at' => '2020-12-23 14:16:51',
                'updated_at' => '2021-01-07 14:19:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'salle 3',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 0,
                'nbre_place' => 22,
                'image' => 'salles/140b017b11aa80955b8338804f662861.jpeg',
                'created_at' => '2020-12-23 14:17:52',
                'updated_at' => '2021-01-07 14:19:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'salle 4',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 1,
                'nbre_place' => 50,
                'image' => 'salles/bd09d11edc4ff391d70eab649d8afda4.jpeg',
                'created_at' => '2020-12-23 14:18:25',
                'updated_at' => '2021-01-07 14:19:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'salle 5',
                'description' => 'equipement imac haute technologie',
                'level' => 2,
                'status' => 1,
                'nbre_place' => 10,
                'image' => 'salles/315cec5d1ec21a069f8e6383fd5f0413.jpeg',
                'created_at' => '2020-12-23 14:18:59',
                'updated_at' => '2021-01-07 14:17:08',
            ),
        ));
        
        
    }
}