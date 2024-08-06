<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $fillable = ['name ', 'code ', 'country_id' , 'is_active','created_at', 'updated_at'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id')->where('is_active', 1);
    }
}
