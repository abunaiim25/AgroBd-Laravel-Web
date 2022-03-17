<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use HasFactory;

    use Notifiable;//change for Email

    protected $fillable = [
        'amount',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
