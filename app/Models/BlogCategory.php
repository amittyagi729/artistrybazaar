<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogCategory extends Model
{
    use HasFactory;
    use Sluggable;
     protected $table = 'blog_categories';
     protected $fillable = ['name', 'slug', 'parent_id'];
     
     public function subcategory()
    {
        return $this->hasMany(\App\Models\BlogCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\BlogCategory::class, 'parent_id');
    }

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
