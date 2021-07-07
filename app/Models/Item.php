<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function avgRating()
{
    return $this->reviews()->avg('rating');
}

    protected $fillable = [
        'name',
        'price',
        'summary',
        'supply',
        'category_id',
        'image',
        'properties',
        'onSale'
    ];
}
