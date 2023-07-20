<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            DB::table('users')->insert([
                'name' => 'sample'. $i,
                'email' => 'sample'. $i .'@gmail.com',
                'password' => Hash::make('sample'. $i),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
