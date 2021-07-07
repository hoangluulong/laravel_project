<?php

namespace Courses\Courses\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    //table
    protected $table = 'classes';
    
    //key
    protected $primaryKey = 'class_id';

    protected $fillable = [
        'class_name', 
        'teacher_id',
        'course_id',
        'faculty_id',
        'status',
    ];

    //get all class
    static function getClass(){
        return Class::all();
    }
    
    //get 1 class theo id
    static function getClassById($id){
        return Class::find($id);
    }

    //add 1 class ($request lấy từ Request $request)
    static function insertClass($request){
        return Class::create([
            'class_name' => $request->class_name,
            'teacher_id' => $request->teacher_id,
            'course_id' => $request->course_id,
            'faculty_id' => $request->faculty_id,
            'status' => 1,
        ]);
    }

    //Update, edit 1 class ($request lấy từ Request $request)
    static function updateClass($request){
        $class = Diary::getClassById($request->class_id);
        $class->teacher_id = $request->teacher_id;
        $class->course_id = $request->course_id;
        $class->faculty_id = $request->faculty_id;
        $class->status = 1;
        $class->save();
    }

    //delete 1 class
    static function deleteClass($request){
        $class = Class::getClass($request->class_id);
        $class->delete();
    }

    //get course liên quan đến class
    public function course()
    {
        return $this->hasMany(Class::class, 'course_id', 'course_id');
    }

    //lấy user liên quan đến class
    public function classuser()
    {
        return $this->hasMany(Class::class, 'class_id', 'class_id');
    }
}
