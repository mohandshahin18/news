<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function authors(){
        return $this->belongsToMany(Author::class,
    'author_categories',
    'author_id',
    'category_id',
    'id',
    'id');
    }

    public function articles(){
        return $this->hasMany(Article::class)->take(9)->orderBy('id','desc');
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($category) {
            $category->articles()->delete();

        });
    }
}
