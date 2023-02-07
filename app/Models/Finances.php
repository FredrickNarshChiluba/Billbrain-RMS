<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finances extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_year_id',
        'course_id',
        'semester_1',
        'semester_2',
        'course_name',
        'intake',
        'added_by'
        
        
    ];

}
