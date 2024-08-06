<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippings extends Model
{
    use HasFactory;
    protected $table = 'shipments';
    protected $fillable = ['order_number ', 'shipping_date '];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function shippedItems()
    {
        $this->hasMany(ShippedItems::class,'shipping_id');
    }
}
