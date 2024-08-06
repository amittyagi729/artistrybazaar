<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipmentTracking extends Model
{
    use HasFactory;

    protected $table="shipment_tracking";

    protected $fillable = [
        'po_id',
        'product_id',
        'quantity_shipped',
        'shipment_date',
        'shipment_agency',
        'tracking_number',
        'shipping_date',
        'payment_received',
        'payment_history_id',
        'Shipment_Created_Date',
        'shipping_price_per_piece'
    ];

    public function order():BelongsTo{
        return $this->belongsTo(Orders::class,'po_id','id');
    }

    public function product():BelongsTo{
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function paymentReminder():BelongsTo{
        return $this->belongsTo(PaymentReminder::class,'po_id','order_id');
    }

    public function priceValue()
    {
        return $this->hasMany(Price::class, 'product_id','product_id');
    }
}
