<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassesUsersSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            DB::table('classes_users')->insert([
                'user_id' => mt_rand(1, 20),
                'class_id' => mt_rand(1, 20),
                'status' => 1,
            ]);
        }
    }
}
