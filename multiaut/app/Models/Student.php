<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'roll_no',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'dob',
        'student_image',
        'phone_number',
        'class_id',
        'section_id',
        'role_id',
    ];

    protected $dates = [
        'dob', // Assuming 'dob' is the date of birth attribute
    ];


    
}
