<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classuser extends Model
{
    use HasFactory;
    protected $table = "classes_users";

    protected $fillable = [
        'user_id', 'class_id', 'status'
    ];  
    
    public function manyClass(){
        return $this->hasMany(Classes::class, 'class_id', 'class_id');
    }

    public function manyUser(){
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}
