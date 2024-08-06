<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'prices';
    protected $casts = [
        'min_qty' => 'integer',
    ];

    protected $dates = ['deleted_at'];
   

}
