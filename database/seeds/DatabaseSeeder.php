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
            'password' => bcrypt('admin'),
            'level'=> 'admin'
        ]);
        \App\User::create([
        	'nama' => 'kasir',
        	'username' => 'kasir',
            'password' => bcrypt('kasir'),
            'level'=> 'kasir'
        ]);
    }
}
