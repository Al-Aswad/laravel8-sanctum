<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'aswad',
            'email' => 'aswad@gmail.com',
            'password' => bcrypt('Bismillah1'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
