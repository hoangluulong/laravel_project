<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassesSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            DB::table('classes')->insert([
                'class_name' => Str::random(10),
                'teacher_id' => mt_rand(1, 20),
                'course_id' => mt_rand(1, 20),
                'faculty_id' => mt_rand(1, 20),
                'status' => 1,                
            ]);
        }
    }
}