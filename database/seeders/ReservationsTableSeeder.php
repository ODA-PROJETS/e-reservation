<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'date_start' => '2020-12-24',
                'hour_start' => '15:12',
                'date_end' => '2020-12-24',
                'hour_end' => '17:12',
                'motif' => NULL,
                'others' => NULL,
                'niveau_validation' => 2,
                'salle_id' => 1,
                'departement_id' => 2,
                'status_id' => 5,
                'created_at' => '2020-12-23 15:12:28',
                'updated_at' => '2020-12-30 10:39:45',
            ),
            1 => 
            array (
                'id' => 3,
                'date_start' => '2020-12-30',
                'hour_start' => '11:30',
                'date_end' => '2020-12-30',
                'hour_end' => '12:30',
                'motif' => NULL,
                'others' => NULL,
                'niveau_validation' => 0,
                'salle_id' => 1,
                'departement_id' => 2,
                'status_id' => 1,
                'created_at' => '2020-12-30 12:57:55',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'date_start' => '2020-12-30',
                'hour_start' => '12:43',
                'date_end' => '2020-12-30',
                'hour_end' => '14:43',
                'motif' => 'lolipop',
                'others' => NULL,
                'niveau_validation' => 0,
                'salle_id' => 4,
                'departement_id' => 2,
                'status_id' => 1,
                'created_at' => '2020-12-30 12:57:57',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}