<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Announcement extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name',
        'title',
    ];
    public function getActivitylogOptions():LogOptions{
        return LogOptions::defaults();
    }
}
