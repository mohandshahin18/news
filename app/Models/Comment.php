<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function image(){
        return  $this->hasOne(Image::class);
    }

}
