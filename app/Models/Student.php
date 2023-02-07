<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Student extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'studentID',
        'intake',
        'course_id',
        'course',
        'academic_year',
        'optional_course',
        'delivery',
        'sponsorship',
        'district',
        'nationality',
        'country',
        'Town',
        'postal',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function mark(){
        return $this->belongsTo(Marks::class);
    }

    public function registration(){
        return $this->hasMany(Registration::class);
    }
    public function getActivitylogOptions():LogOptions{
        return LogOptions::defaults();
    }

}
