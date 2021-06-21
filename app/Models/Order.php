<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_array', 
        'user_id', 
        'total_cost', 
        'delivery_adress',
        'processed'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //MAYBE ITEMS?
}


