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

    // public function courseSub() {
    //     return $this->hasMany(Subject::class,'subject_id','subject_id');
    // }

    public function manyCourse(){
        return $this->hasMany(Course::class, 'course_id', 'course_id');
    }

    public function manySubject(){
        return $this->hasMany(Subject::class, 'subject_id', 'subject_id');
    }
    
}
