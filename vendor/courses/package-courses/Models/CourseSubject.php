<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    //table
    protected $table = 'course_subject';

    //key
    protected $primaryKey = 'id';

    protected $fillable = [
        'course_id', 
        'subject_id',
        'status',
    ];

    //get all course_subject (chưa join)
    static function getCourseSubject(){
        return Course::all();
    }
    
    //get 1 course_subject by id
    static function getCourseSubjectById($id){
        return Course::find($id);
    }

    //add 1 diary_content
    static function insertCourseSubject($request){
        $course_subject = new CourseSubject();
        $course_subject->course_id = $request->course_name;
        $course_subject->subject_id = $request->subject_id;
        $course_subject->status = $request->status;
        $course_subject->save();
    }

    //update, edit 1 course_subject ($request lấy từ Request $request)
    static function updateCourseSubject($request){
        $course_subject = CourseSubject::getCourseSubject($request->id);
        $course_subject->course_id = $request->course_name;
        $course_subject->subject_id = $request->subject_id;
        $course_subject->status = $request->status;
        $course_subject->save();
    }

    //delete 1 course_subject ($request lấy từ Request $request, bao gồm subject có liên quan)
    static function deleteCourseSubject($request){
        $course_subject = CourseSubject::getCourseSubject($request->id);
        $subjects = $course_subject->Subject();
        foreach ($subjects as $subject){
            $subject->delete();
        }
        $course_subject->delete();
    }

    //get subject -> course_subject
    public function subject()
    {
        return $this->has(Subject::class, 'subject_id', 'subject_id');
    }

    //get course -> course_subject
    public function course()
    {
        return $this->hasOne(Course::class, 'course_id', 'course_id');
    }
}
