<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Registration extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'student_id',
        'academic_year',
        'semster',
        'year_of_study',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function getActivitylogOptions():LogOptions{
        return LogOptions::defaults();
    }
}
