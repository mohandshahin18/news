<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Authenticatable
{
    use HasFactory;

    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type','actor_id','id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class,
        'author_categories',
        'author_id',
        'category_id',
        'id',
        'id');
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }


    public function getFullNameAttribute(){
        return $this->user->firstname . " " . $this->user->lastname ;
    }

    public function getImageAttribute(){
        return $this->user->image ;
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($auhtor) {
            $auhtor->user()->delete();
            // $auhtor->articles()->delete();


        });
    }

}