<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'item_name', 'details', 'quantity', 'unit'
    ];

    // Agar user relation chahiye
    public function user() {
        return $this->belongsTo(User::class);
    }
}
