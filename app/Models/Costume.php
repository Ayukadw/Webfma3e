<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Costume extends Model
{
    protected $table = 'costumes';

    protected $fillable = [
        'name', 'description', 'category_id', 'size_id', 'price_per_day',
        'stock', 'image_url', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
