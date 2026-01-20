<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','brand_id','seller_id',
        'name','slug','description','price','discount_price','stock','rating', 'color','warranty', 'size','status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function attributes() {
        return $this->belongsToMany(AttributeValue::class,'product_attributes');
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function supplier()
    {
        return $this->belongsTo(SupplierRequest::class, 'supplier_request_id');
    }

    public function carts()
{
    return $this->hasMany(Cart::class);
}



   
}
