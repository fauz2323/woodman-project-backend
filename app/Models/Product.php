<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    /**
     * Get all of the userCart for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userCart()
    {
        return $this->hasMany(UserCart::class, 'product_id', 'id');
    }

    /**
     * Get all of the itemsProduct for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemsProduct()
    {
        return $this->hasMany(UserOrderItem::class, 'product_id', 'id');
    }
}
