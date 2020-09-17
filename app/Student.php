<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'student_number','name','email', 'address','phone','gender'
    ];

    
}
