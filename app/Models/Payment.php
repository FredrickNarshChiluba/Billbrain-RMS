<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    use HasFactory;
    

    protected $fillable = [ 
        'amount',
        'reason',
        'mode',
        'balance',
        'currency',
        'payment_summaries_id',
        'receipt_id',
        'received_by'
        
    ];

    public function registration(){
        return $this->belongsTo(Registration::class);
    }

    public function accountant(){
        return $this->belongsTo(Accountant::class);
    }
    public function finance(){
        return $this->hasOne(financeStructure::class);
    }
    

}
