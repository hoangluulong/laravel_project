<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    protected $table = "users";

    protected $fillable = [
        'user_name', 'usertype_id','group_id','user_email','user_password','faculty_id'
    ];  

    public function AllUser()
    {
        $user = $this->all();
        return $user;
    }
}
