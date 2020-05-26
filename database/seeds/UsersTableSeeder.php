<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Test',
            'email' => 'admintest@test.com',
            'password' => bcrypt('test123'),
        ]);
    }
}
