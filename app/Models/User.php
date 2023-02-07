<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'district',
        'nationality',
        'country',
        'Town',
        'postal',
        'password',
        'phone_1',
        'phone_2',
        'gender',
        'date_of_birth',
        'religion',
        'marital_status',
        'spouse_name',
        'spouse_contact',
        'disability',
        'nature_of_disability',
        'role',
        'father_name',
        'father_contact',
        'mother_name',
        'mother_contact',
        'profileImage',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student(){
        return $this->hasOne(Student::class);
    }
    public function lecturer(){
        return $this->hasOne(Lecturer::class);
    }

    public function Admin(){
        return $this->hasOne(Admin::class);
    }

    public function Accountant(){
        return $this->hasOne(Accountant::class);
    }

    public function SuperUser(){
        return $this->hasOne(SuperUser::class);
    }
   
}
