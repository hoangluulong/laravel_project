<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //table
    protected $table = 'courses';

    //key
    protected $primaryKey = 'id';

    //các cột được phép thay đổi
    protected $fillable = [
        'course_name',
        'course_semaster',
        'course_year',
        'status',
    ];

    //get all course (chưa join)
    static function getCourses()
    {
        return Course::all();
    }

    //get 1 courses theo id (id lấy từ request,chưa join)
    static function getCourseById($id)
    {
        return Course::find($id);
    }

    //add 1 course ($request lấy từ Request $request)
    static function insertCourse($request)
    {
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->course_semaster = $request->course_semaster;
        $course->course_year = $request->course_year;
        $course->status = $request->status;
        $course->save();
    }

    //update, edit course ($request lấy từ Request $request)
    static function updateCourse($request)
    {
        $course = Course::getCourseById($request->id);
        $course->course_name = $request->course_name;
        $course->course_semaster = $request->course_semaster;
        $course->course_year = $request->course_year;
        $course->status = $request->status;
        $course->save();
    }

    //delete 1 course ($request lấy từ Request $request)
    static function deleteCourse($request)
    {
        $course = Course::getCourseById($request->id);
        $course->delete();
    }

    //lấy class -> course
    public function class()
    {
        return $this->hasOne(class::class, 'course_id', 'course_id');
    }

    //lấy course_subject -> Course
    public function subject()
    {
        return $this->hasOne(CourseSubject::class, 'course_id', 'course_id');
    }
}
