<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $primaryKey = 'faculty_id';

    protected $fillable = [
        'faculty_name', 'status'
    ];

    public function AllFaculty()
    {
        $faculties = $this->all();
        return $faculties;
    }

    public function searchFacultyName($class_name){
        $faculties = $this -> where('faculty_name', 'like', '%'.$class_name.'%')->get();
        return $faculties;
    }
}
