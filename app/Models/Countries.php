<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = ['name ', 'iso_code ','currency_id', 'is_active','created_at', 'updated_at'];
    
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class, 'currency_id')->where('is_active', 1);
    }
}
