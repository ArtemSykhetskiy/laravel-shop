<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'short_description',
        'price',
        'discount',
        'thumbnail',
        'in_stock',
        'SKU'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'wish_list',
            'product_id',
            'user_id'
        );
    }

    public function endPrice() : Attribute
    {
        return new Attribute(
            get: function() {
                $price = is_null($this->attributes['discount'])
                    ? $this->attributes['price']
                    : ($this->attributes['price'] - ($this->attributes['price'] * ($this->attributes['discount'] / 100)));

                return $price < 0 ? 0 : round($price, 2);
            }
        );
    }

    public function scopePriceFilter($query, $from, $to)
    {
        return $query->whereBetween('price', [$from, $to]);
    }


    public function available() : Attribute
    {
        return new Attribute(
          get: function (){
              $available = $this->attributes['in_stock'] > 0 ? 'Available' : 'Not available';
              return $available;
            }
        );
    }
}
