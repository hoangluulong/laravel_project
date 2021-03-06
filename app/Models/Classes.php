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
}
