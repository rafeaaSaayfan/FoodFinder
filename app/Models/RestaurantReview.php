<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'restaurant_id', 'rating', 'comment'
    ];

    public function user_review()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant_review()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
