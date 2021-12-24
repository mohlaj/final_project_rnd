<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff')->delete();
        
        \DB::table('staff')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-12-20 19:56:47',
                'updated_at' => '2021-12-20 19:56:47',
                'name' => 'Nabil',
                'designation' => 'Perferendis nobis ha',
                'address' => 'Quia iusto dolorem c',
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-12-20 19:56:51',
                'updated_at' => '2021-12-20 19:56:51',
                'name' => 'Mohammed',
                'designation' => 'Id aut tempora eaque',
                'address' => 'Occaecat cillum cons',
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2021-12-20 19:56:54',
                'updated_at' => '2021-12-20 19:56:54',
                'name' => 'Amirul',
                'designation' => 'Irure doloribus exce',
                'address' => 'Praesentium nulla ci',
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2021-12-20 19:56:59',
                'updated_at' => '2021-12-20 19:56:59',
                'name' => 'Omar',
                'designation' => 'Perferendis libero l',
                'address' => 'Libero laboriosam i',
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2021-12-20 19:57:04',
                'updated_at' => '2021-12-20 19:57:04',
                'name' => 'Sami',
                'designation' => 'Totam eos sit cupid',
                'address' => 'Laborum Dignissimos',
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2021-12-20 19:57:08',
                'updated_at' => '2021-12-20 19:57:08',
                'name' => 'Abubakar',
                'designation' => 'Ad laudantium proid',
                'address' => '-',
            ),
        ));
        
        
    }
}