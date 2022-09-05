<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Article extends Model
{
    use HasFactory , HasRoles;

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }


    // protected static function boot() {
    //     parent::boot();

    //     static::deleting(function($article) {
    //         $article->author()->user()->delete();

    //     });
    // }


}
