<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';

    protected $fillable = [
        'order_id', 'product_id', 'sku', 'quantity', 'price', 'discount'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function priceValue()
    {
        return $this->hasMany(Price::class, 'product_id','product_id');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function shipmentTracking(){
        return $this->hasMany(ShipmentTracking::class,'po_id','order_id')->where('product_id',$this->product_id);
    }

}
