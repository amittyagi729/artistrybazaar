<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instock extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'instock';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function productImg(){
        return $this->hasMany(Productimage::class,'product_id','product_id');
    }

}
