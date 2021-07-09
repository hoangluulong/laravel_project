<?php namespace Database\Seeders;

use Foostart\Category\Helpers\FoostartSeeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FacultiesSeeder extends Seeder
{

   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('faculties')->insert([
                'faculty_name' => "Khoa công nghệ thông tin",
                'status' => 1,
            ]);
            DB::table('faculties')->insert([
                'faculty_name' => "Khoa tiềng hàn",
                'status' => 1,
            ]);
            DB::table('faculties')->insert([
                'faculty_name' => "Khoa tiềng nhật",
                'status' => 1,
            ]);
            DB::table('faculties')->insert([
                'faculty_name' => "Khoa tiềng anh",
                'status' => 1,
            ]);
        
    }
}