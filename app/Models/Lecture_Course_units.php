<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Lecture_Course_units extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_unit_code',
        'email',
        
    ];


    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }

   
}
