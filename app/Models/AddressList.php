<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressList extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'addresses';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id ', 'street_number','address_line1', 'address_line2',
        'city_id ', 'state_id','zip_code', 'country_id',
        'address_type ', 'is_default','is_active'
    ];

    public function city()
{
    return $this->belongsTo(Cities::class, 'city_id')->where('is_active', 1);
}
    public function state()
{
    return $this->belongsTo(States::class, 'state_id')->where('is_active', 1);
}
    public function country()
{
    return $this->belongsTo(Countries::class, 'country_id')->where('is_active', 1);
}
    public function addressType()
{
    return $this->belongsTo(AddressType::class, 'address_type')->where('is_active', 1);
}

public function scopeBilling($query)
    {
        return $query->where('is_billing', 1);
    }
public function scopeShipping($query)
    {
        return $query->where('is_billing', 0);
    }

public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
