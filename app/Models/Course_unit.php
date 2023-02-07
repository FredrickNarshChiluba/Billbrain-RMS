<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Course_unit extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'course_name',
        'course_code',
        'course_unit_code',
        'L',
        'P',
        'CH',
        'CU',
        'YearOfStudy','Semester','course_id',
    ];

    public function Course(){
        return $this->hasOne(Course::class);
    }
    public function mark(){
        return $this->belongsTo(Marks::class);
    }
    public function getActivitylogOptions():LogOptions{
        return LogOptions::defaults();
    }
}
