<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function comment(){
        return  $this->belongsTo(Comment::class);
    }
    public function visitor(){
        return  $this->belongsTo(Visitor::class);
    }
}
