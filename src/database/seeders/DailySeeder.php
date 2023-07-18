<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($j = 1; $j <= 10; $j++){
            for($i = 1; $i <= 5; $i++){
                DB::table('dailies')->insert([
                    'date' => now(),
                    'title' => 'Title '. $i,
                    'body' => 'This is body '. $i. '.',
                    'user_id' => $j,
                ]);
            }
        }
    }
}
