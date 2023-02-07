<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'registration_id',
        'student_id',
        'course_unit_id',
        'mode_of_enrollment',
        
    ];
}
