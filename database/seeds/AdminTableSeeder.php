<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert([
            'username' => 'Eastern Engineering College',
            'email' => 'easternengineering@gmail.com',
            'password' => bcrypt('estern123'),
            'status'  =>'1',
            'image'   =>'eastern.jpg',
        ]);
    }
}
