<?php

use Illuminate\Database\Seeder;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'nama' => 'admin',
        	'username' => 'admin',
            'password' => bcrypt('admin'),
            'level'=> 'admin'
        ]);
        \App\User::create([
        	'nama' => 'kasir',
        	'username' => 'kasir',
            'password' => 
            bcrypt('kasir'),
            'level'=> 'kasir'
        ]);
    }
}
