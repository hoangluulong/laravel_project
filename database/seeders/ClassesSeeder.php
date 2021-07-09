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
        $ran1 = array(19,20,18,17);
        $ran2 = array('TT','TA','TH','TN');
        for ($i=0; $i < 20; $i++) { 
            DB::table('classes')->insert([
                'class_name' => 'CD'.$ran1[mt_Rand(0, count($ran1) - 1)].$ran2[mt_Rand(0, count($ran2) - 1)].$i,
                'teacher_id' => mt_rand(19,25),
                'course_id' => mt_rand(1, 20),
                'faculty_id' =>mt_rand(1, 4),
                'status' => 1,                
            ]);
        }
    }
}