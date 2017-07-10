<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "member";

    protected $fillable = ['first_name', 'last_name', 'username', 'password', 'birth_date', 'email', 'mobile_no', 'title'];

}
