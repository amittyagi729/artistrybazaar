<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippedItems extends Model
{
    use HasFactory;
    protected $table = 'shipped_items';

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    protected $fillable = ['shipping_id', 'product_id', 'shipping_qty', 'shipping_date', 'payment_status', 'is_active'];

    public function Shipping(){
       return $this->belongsTo(Shippings::class);
    }
 
}
