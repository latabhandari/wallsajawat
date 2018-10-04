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
        //
	DB::table('users')->insert([
                                    'name' => 'admin',
                                    'email' => 'admin@gmail.com',
                                    'password' => bcrypt('admin'),
                                    'role_id' => 1,
                                    'unix_timestamp' => time()
                              ]);
    }
}
