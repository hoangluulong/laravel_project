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
        for ($i=0; $i < 20; $i++) { 
            DB::table('faculties')->insert([
                'faculty_name' => Str::random(10),
                'status' => 1,
            ]);
        }
    }
}