<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirection extends Model
{
    protected $table = 'redirections';

    protected $fillable = [
        'redirect_from', 'redirect_to'
    ];
}
