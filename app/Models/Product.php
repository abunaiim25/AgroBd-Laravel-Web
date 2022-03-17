<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable  = [
        'category_id','brand_id','product_name','product_slug','product_code',
        'product_quantity','description','price',
        'image_one','image_two','image_three','image_four','status',
        ];

        public function category(){
            return $this->belongsTo(Category::class, 'category_id');//joined with category id
        }
}
