<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'subject_id';

    protected $fillable = [
        'subject_name','status'
    ];   
    
    public function AllSubject()
    {
        $subject = $this->all();
        return $subject;
    }

    public function searchSubjectName($subject_name){
        $subject = $this -> where('subject_name', 'like', '%'.$subject_name.'%')->get();
        return $subject;
    }
}
