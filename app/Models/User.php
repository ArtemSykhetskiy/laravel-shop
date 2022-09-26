<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Zorb\Promocodes\Traits\AppliesPromocode;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, AppliesPromocode;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'birthdate',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function wishes()
    {
        return $this->belongsToMany(
            Product::class,
            'wish_list',
            'user_id',
            'product_id'
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addToWish(Product $product)
    {
        $this->wishes()->attach($product);
    }

    public function removeFromWish(Product $product)
    {
        $this->wishes()->detach($product);
    }
}
