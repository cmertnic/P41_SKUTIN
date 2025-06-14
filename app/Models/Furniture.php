<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
    ];

    public function furnitures()
    {
        return $this->hasMany(Report::class, 'furniture_id'); 
    }
}
