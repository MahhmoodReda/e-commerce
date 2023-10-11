<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected  $fillable=[
        'user_id',
        'tracking_no',
        'name',
        'phone',
        'email',
        'pincode',
        'payment_type',
        'payment_id',
        'address',
        'status_message',

    ];

    /**
     * Get all of the comments for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(Order_item::class);
    }
}
