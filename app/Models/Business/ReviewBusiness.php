<?php

namespace App\Models\Business;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewBusiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prod_id',
        'user_review'
    ];

    


    public function business(){
        return $this->belongsTo(MyBusiness::class,'prod_id');
    }

}
