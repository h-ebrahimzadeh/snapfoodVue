<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Food extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'foods';


    protected $fillable = [
        'name',
        'food_categories_id',
        'materials',
        'image',
        'price',
        'coupon_id',
        'food_parties_id',
        'restaurant_id',
        'user_id',
        'image_url',
        'timestamps',

    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function foodParty()
    {
        return $this->hasOne(FoodParty::class, 'id', 'food_parties_id');
    }

    public function coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }

    public function foodCategory()
    {
        return $this->hasOne(FoodCategory::class, 'id', 'food_categories_id');
    }

    public function getProfileImageUrlAttribute()
    {
        return Storage::disk('snap-food')->url($this->image);
    }

    public function cart()
    {
        return $this->hasManyThrough(Cart::class, Restaurant::class);
    }

}
