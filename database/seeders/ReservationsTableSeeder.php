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
                'date_start' => '2020-12-28',
                'hour_start' => '15:12',
                'date_end' => '2020-12-24',
                'hour_end' => '17:12',
                'salle_id' => 1,
                'departement_id' => 2,
                'status_id' => 4,
                'created_at' => '2020-01-05 15:12:28',
                'updated_at' => '2020-12-23 16:10:22',
            ),
            1 => 
            array (
                'id' => 2,
                'date_start' => '2020-12-20',
                'hour_start' => '8:00',
                'date_end' => '2020-12-20',
                'hour_end' => '18:00',
                'salle_id' => 3,
                'departement_id' => 2,
                'status_id' => 4,
                'created_at' => '2021-01-02 15:12:28',
                'updated_at' => '2020-12-23 16:10:22',
            ),
            2 => 
            array (
                'id' => 3,
                'date_start' => '2020-12-28',
                'hour_start' => '12:00',
                'date_end' => '2020-12-30',
                'hour_end' => '12:02',
                'salle_id' => 3,
                'departement_id' => 2,
                'status_id' => 1,
                'created_at' => '2021-01-07 07:38:48',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}