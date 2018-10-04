<?php

use Illuminate\Database\Seeder;

class RoleAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
                                    'name' => 'Admin',
                                    'permission' => '{"permission":"all"}',
                                    'created_at_timestamp' => time()
                              ]);
        }

    }
}
