<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    protected  $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Get the user that owns the Order_item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
