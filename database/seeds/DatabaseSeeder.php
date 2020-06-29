<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'nama' => 'admin',
        	'username' => 'admin',
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'level'=> 'admin'
        ]);
        \App\User::create([
        	'nama' => 'kasir',
        	'username' => 'kasir',
        	'email' => 'kasir@gmail.com',
            'password' => bcrypt('kasir'),
            'level'=> 'kasir'
        ]);
    }
}
