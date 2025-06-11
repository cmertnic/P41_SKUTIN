<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'type',
        'payment',
        'count',
        'furniture_id', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function furnitures() 
    {
        return $this->belongsTo(Furniture::class, 'furniture_id'); 
    }      
    
}
