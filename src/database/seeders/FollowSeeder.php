<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user_id = 1がフォローしている人
        for($i = 1; $i <= 4; $i++){
            DB::table('follows')->insert([
                'follower_user_id' => 1,
                'followee_user_id' => $i+1,
            ]);
        }

        // user_id = 1をフォローしている人
        for($i = 2; $i <= 5; $i++){
            DB::table('follows')->insert([
                'follower_user_id' => $i,
                'followee_user_id' => 1,
            ]);
        }
    }
}
