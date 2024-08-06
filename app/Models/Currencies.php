<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    use HasFactory;
    protected $table = 'currency';
    protected $fillable = ['code ', 'name ', 'symbol', 'exchange_rate', 'country_id', 'created_at', 'updated_at'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
