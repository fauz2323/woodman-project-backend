<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    //
    protected $guarded = [];

    /**
     * Get the user that owns the UserOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the items for the UserOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(UserOrderItem::class, 'user_id', 'id');
    }
}
