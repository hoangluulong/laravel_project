<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ran = array('Pham','Tran','Nguyen','Ho');
        $ran1 = array('Van','Phuoc','Xuan','Tan');
        $ran2 = array('Long','Truong','Hung','Triet','Thach');
        $ran3 = array(1,2);
        for ($i=0; $i < 20; $i++) { 
            DB::table('users')->insert([
                'user_name' =>$ran[mt_Rand(0, count($ran) - 1)].' '.$ran1[mt_Rand(0, count($ran) - 1)].' '.$ran2[mt_Rand(0, count($ran) - 1)],
                'usertype_id' => $ran3[mt_Rand(0, count($ran) - 3)],
                'group_id' => mt_rand(1, 5),
                'user_email' => 'user'.$i.'@gmail.com',
                'user_password' => Hash::make('123456'),
                'faculty_id' => mt_rand(1, 5),
                'status' => 1,
            ]);
        }

        for ($i=0; $i < 5; $i++) { 
            DB::table('users')->insert([
                'user_name' =>$ran[mt_Rand(0, count($ran) - 1)].' '.$ran1[mt_Rand(0, count($ran) - 1)].' '.$ran2[mt_Rand(0, count($ran) - 1)],
                'usertype_id' => 3,
                'group_id' => mt_rand(1, 5),
                'user_email' => 'user'.$i.'@gmail.com',
                'user_password' => Hash::make('123456'),
                'faculty_id' => mt_rand(1, 5),
                'status' => 1,
            ]);
        }

        for ($i=0; $i < 5; $i++) { 
            DB::table('users')->insert([
                'user_name' =>$ran[mt_Rand(0, count($ran) - 1)].' '.$ran1[mt_Rand(0, count($ran) - 1)].' '.$ran2[mt_Rand(0, count($ran) - 1)],
                'usertype_id' => 4,
                'group_id' => mt_rand(1, 5),
                'user_email' => 'user'.$i.'@gmail.com',
                'user_password' => Hash::make('123456'),
                'faculty_id' => mt_rand(1, 5),
                'status' => 1,
            ]);
        }
    }
}