<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=[
        'item',
        'category_id',
        'description',
        'price',
        'condition',
        'type',
        'publish',
        'img',
        'owner',
        'phone',
        'address',
        'lat',
        'lng',
        

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
