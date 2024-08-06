<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialType extends Model
{
    use HasFactory;
    protected $table = 'materialtype';

    protected $fillable = ['name', 'is_active'];

    public function product(){
        return $this->belongsTo(Product::class,'id','material');
    }
}
