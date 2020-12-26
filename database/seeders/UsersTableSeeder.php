<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@oda.ci',
                'email_verified_at' => NULL,
                'password' => '$2y$10$727P7LVTc4/YCrTw9BzkYe5/Lue5DE8HugI.9LxGxvB74./gZFGMm',
                'is_admin' => 1,

                'remember_token' => 'lo37dpihkoDIuTDk2bmNjAM70JuUzbFeLYxc3ez98U88KJCZhMIFsXW0iQvb',
                'created_at' => '2020-12-22 15:08:33',
                'updated_at' => '2020-12-23 13:18:02',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'sminth lolipop',
                'email' => 'virtus225one@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ulY92U5n.p8yShMgoEsaOeUJ.FraifIBmLoakHujl5TRVDjns2QWK',
                'is_admin' => 0,

                'remember_token' => NULL,
                'created_at' => '2020-12-23 12:43:45',
                'updated_at' => '2020-12-23 13:17:09',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'serveur',
                'email' => 'serveur@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Luz6FFa.u7AVqQ5gVMATXOSLzX.GUDR2m6Mi40GC1fd1uDHvR6GdC',
                'is_admin' => 0,

                'remember_token' => NULL,
                'created_at' => '2020-12-23 12:44:13',
                'updated_at' => '2020-12-23 13:17:38',
            ),
        ));


    }
}
