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
}
