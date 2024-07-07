<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id', 'profile_image', 'detail_image_1', 'detail_image_2', 'detail_image_3', 'detail_image_4'
    ];

    public function restaurant_image()
    {
        return $this->belongsTo(RestaurantImage::class);
    }
}
