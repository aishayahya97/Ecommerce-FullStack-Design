<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','status'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
