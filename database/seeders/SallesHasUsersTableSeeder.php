<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SallesHasUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('salles_has_users')->delete();
        
        \DB::table('salles_has_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salle_id' => 1,
                'user_id' => 3,
                'deleted_at' => '2020-12-30 11:05:23',
                'created_at' => '2020-12-30 11:05:25',
                'updated_at' => '2020-12-30 11:05:26',
            ),
            1 => 
            array (
                'id' => 2,
                'salle_id' => 1,
                'user_id' => 1,
                'deleted_at' => '2020-12-30 11:05:44',
                'created_at' => '2020-12-30 11:05:45',
                'updated_at' => '2020-12-30 11:05:46',
            ),
            2 => 
            array (
                'id' => 4,
                'salle_id' => 4,
                'user_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2021-01-07 09:37:34',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'salle_id' => 4,
                'user_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2021-01-07 09:46:54',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}