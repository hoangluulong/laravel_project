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

    public function searchClassUserID($class_name, $table_name){
        if($table_name == 'class_id' || $table_name == 'user_id'){
            $classuser = $this -> where($table_name ,$class_name)->get();
        }
        else{
            $table = "";
            $colum = "";
            if($table_name === "user_name"){
                $table = "users";
                $colum = "user_id";
            }else{
                $table = "classes";
                $colum = "class_id";
            }
            
            $classuser = $this ->join($table, 'classes_users.'.$colum, '=', $table.'.'.$colum)
                                    ->select('classes_users.*')
                                    ->where($table.'.'.$table_name, 'like', '%'.$class_name.'%')
                                    ->get();
        }
      
        return $classuser;
    }
}
