<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CoursesSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ran = array(1,2);

        for ($i=0; $i < 20; $i++) { 
            DB::table('courses')->insert([
                'course_name' =>'Name'.mt_rand(16,21),
                'course_semester' =>'Hoc ky'.$ran[mt_Rand(0, count($ran) - 1)],
                'course_year' => mt_rand(2016, 2021),
                'status' => 1,
            ]);
        }
    }
}