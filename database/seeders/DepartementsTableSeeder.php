<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departements')->delete();
        
        \DB::table('departements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'departement 1',
                'description' => 'departement ODA',
                'user_id' => 3,
                'created_at' => '2020-12-23 14:24:48',
                'updated_at' => '2020-12-23 14:24:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'departement 2',
                'description' => 'departement DRH',
                'user_id' => 2,
                'created_at' => '2020-12-23 14:25:20',
                'updated_at' => '2020-12-23 14:25:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'departement 3',
                'description' => 'département orange money',
                'user_id' => 3,
                'created_at' => '2020-12-23 14:26:24',
                'updated_at' => '2020-12-23 14:26:24',
            ),
        ));
        
        
    }
}