<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingBusiness extends Model
{
    use HasFactory;
    
    protected $fillable = [

        'user_id',
        'prod_id',
        'stars_rated',
        
    ];
}
