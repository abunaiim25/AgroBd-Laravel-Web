<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBusiness extends Model
{
    use HasFactory;

    
  protected $fillable = [
    'image_one',
    'image_two',
    'image_three',
    'image_four',
  
];
}
