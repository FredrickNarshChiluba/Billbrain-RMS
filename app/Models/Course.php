<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Course extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name',
        'code',
        'duration',
        'Period',
        'LevelOfStudy',
        
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }
    public function lecturer(){
        return $this->hasMany(Lecturer::class);
    }
    public function Course_unit(){
        return $this->hasOne(Course_unit::class);
    }
    public function getActivitylogOptions():LogOptions{
        return LogOptions::defaults();
    }
}
