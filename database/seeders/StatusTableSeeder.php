<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status')->delete();
        
        \DB::table('status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'en attente ...',
                'created_at' => '2020-12-23 13:06:10',
                'updated_at' => '2020-12-23 13:06:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'reservé',
                'created_at' => '2020-12-23 13:06:11',
                'updated_at' => '2020-12-23 13:06:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'en cour',
                'created_at' => '2020-12-23 13:06:22',
                'updated_at' => '2020-12-23 13:06:24',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'terminé',
                'created_at' => '2020-12-23 13:06:52',
                'updated_at' => '2020-12-23 13:06:54',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'annulé',
                'created_at' => '2020-12-23 15:47:17',
                'updated_at' => '2020-12-23 15:47:18',
            ),
        ));
        
        
    }
}