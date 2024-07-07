<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 'restaurant_name', 'description', 'address', 'restaurant_phone', 'restaurant_email', 'status',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant_images()
    {
        return $this->hasMany(RestaurantImage::class);
    }

    public function restaurant_reviews()
    {
        return $this->hasMany(RestaurantReview::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function completedOrders() {
        return $this->hasMany(Order::class)->where('status', 'completed');
    }
}
