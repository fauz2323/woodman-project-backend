<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrderItem extends Model
{
    //
    protected $guarded = [];

    /**
     * Get the userOrder that owns the UserOrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userOrder()
    {
        return $this->belongsTo(UserOrder::class, 'user_order_id', 'id');
    }

    /**
     * Get the product that owns the UserOrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
