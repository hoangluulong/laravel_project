<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $primaryKey = 'class_id';

    protected $fillable = [
        'class_name', 'teacher_id','course_id','faculty_id','status'
    ];

    public function manyFaculty(){
        return $this->hasMany(Faculty::class, 'faculty_id', 'faculty_id');
    }

    public function manyCourse(){
        return $this->hasMany(Course::class, 'course_id', 'course_id');
    }

    //get all class
    public function AllClass()
    {
        $class = $this->all();
        return $class;
    }

    public function searchClassesName($class_name, $table_name){

        if($table_name == 'course_id'  || $table_name == 'faculty_id' || $table_name == 'teacher_id'){
            $class = $this -> where($table_name ,$class_name)->get();
        }
        else if($table_name == 'class_name'){
            $class = $this -> where($table_name, 'like', '%'.$class_name.'%')->get();  
        }
        else{
            $table = "";
            $colum = "";
            if($table_name === "course_name"){
                $table = "courses";
                $colum = "course_id";
            }else{
                $table = "faculties";
                $colum = "faculty_id";
            }
            $class =  $this ->join($table, 'classes.'.$colum, '=', $table.'.'.$colum)
            ->select('classes.*')
            ->where($table.'.'.$table_name, 'like', '%'.$class_name.'%')
            ->get();
        }
        return $class;
    }


}