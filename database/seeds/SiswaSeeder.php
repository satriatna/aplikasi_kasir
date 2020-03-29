<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 2000; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('users')->insert([
    			'nis' => '11706001',
    			'nama' => $faker->name,
    			'username' => $faker->username,
    			'password' => bcrypt($faker->address),
                'email' => $faker->username,
                'level'=>'Siswa'
                ]);
 
    	}
    }
}
