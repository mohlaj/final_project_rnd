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
                'name' => 'Project Manager',
                'role' => 'PM',
                'email' => 'lajam@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AjcbBCI6bciOh/dljPBHL.WzPfEY6k2DApSPkj6tTgwHx.rsB4GU6',
                'remember_token' => NULL,
                'created_at' => '2021-12-20 18:22:02',
                'updated_at' => '2021-12-20 18:22:02',
            ),
            1 =>
            array (
                'id' => 4,
                'name' => 'Project Leader',
                'role' => 'PL',
                'email' => 'leader@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TN38wJsn/ghp67u8YJWR7OPRPpO0ZlzvForV2bMgilVc4p4B7TdLy',
                'remember_token' => NULL,
                'created_at' => '2021-12-20 19:53:38',
                'updated_at' => '2021-12-20 19:53:38',
            ),
        ));


    }
}
