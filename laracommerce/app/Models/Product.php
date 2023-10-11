<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable=[
        'name',
        'slug',
        'small_description',
        'brand_id',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'category_id',
    ];

    public function category()
    {
            return $this->belongsTo(Category::class);
    }
    public function brand()
    {
            return $this->belongsTo(Brands::class);
    }

    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }

}