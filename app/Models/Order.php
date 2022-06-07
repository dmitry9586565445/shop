<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Order extends Model
{
    use HasFactory;

    public function products(): Relation
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('count')->withTimestamps();
    }

    public function getFullPrice(): int
    {
        $sum = 0;

        foreach ($this->products as $product)
        {
            $sum += $product->getTotalPrice($product->pivot->count);
        }

        return $sum;
    }
}
