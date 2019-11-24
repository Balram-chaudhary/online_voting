<?php

use Illuminate\Database\Seeder;

class VoterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('voters')->insert([
            'name' => 'Bishal',
            'email' => 'bishal@gmail.com',
            'password' => bcrypt('estern123'),
            'phone' =>'981939393',
            'status'  =>'u',
            'image'   =>'eastern.jpg',
            'licence_number'=>'k399202',
            'licence_image'=>'bisal.jpg',
            'state'=>'p1',
            'address'=>'Duhabi'

        ]);
    }
}
