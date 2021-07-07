<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'course_id';
    protected $table = "courses";

  
    protected $fillable = [
        'course_name', 'course_semester', 'course_year', 'status'
    ];

    public function AllCourse()
    {
        $courses = $this->all();
        return $courses;
    }

    public function searchCourseName($course_name, $table_name){
        $course = $this -> where($table_name, 'like', '%'.$course_name.'%')->get();

        return $course;
    }
}