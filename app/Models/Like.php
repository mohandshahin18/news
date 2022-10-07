<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_id' , 'comment_id' , 'id'];
    public $timestamps = false;

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }
}
