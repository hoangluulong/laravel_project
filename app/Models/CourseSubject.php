<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "course_subject";

    protected $fillable = [
        'course_id','subject_id','status'
    ];    

    public function manyCourse(){
        return $this->hasMany(Course::class, 'course_id', 'course_id');
    }

    public function manySubject(){
        return $this->hasMany(Subject::class, 'subject_id', 'subject_id');
    }
    
    public function searchCourseSubject($value, $table_name){
        $course_subject;
        if($table_name === "course_id" || $table_name === "subject_id"){
            $course_subject = $this -> where($table_name, $value)->get();
        }else{
            $table = "";
            $colum = "";
            if($table_name === "subject_name"){
                $table = "subjects";
                $colum = "subject_id";
            }else{
                $table = "courses";
                $colum = "course_id";
            }
            
            $course_subject = $this ->join($table, 'course_subject.'.$colum, '=', $table.'.'.$colum)
                                    ->select('course_subject.*')
                                    ->where($table.'.'.$table_name, 'like', '%'.$value.'%')
                                    ->get();
        }
        return $course_subject;
    }
}