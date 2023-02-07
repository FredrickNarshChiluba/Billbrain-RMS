<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Marks extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'studentID',
        'test',
        'exam',
        'score',
        'course_unit_id',
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }
    // public function getActivitylogOptions():LogOptions{
    //     return LogOptions::defaults();
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function course_unit(){
        return $this->belongsTo(Course_unit::class);
    }

    public function registration(){
        return $this->hasMany(Registration::class);
    }
    public function getActivitylogOptions():LogOptions{
        return LogOptions::defaults();
    }
}
