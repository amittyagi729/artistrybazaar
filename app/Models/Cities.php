<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['name ', 'state_id ', 'country_id', 'is_active','created_at', 'updated_at'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function state()
    {
        return $this->belongsTo(States::class, 'state_id')->where('is_active', 1);
    }
   
}
