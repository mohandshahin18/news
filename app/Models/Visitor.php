<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Visitor extends Authenticatable
{
    use HasFactory , Notifiable;

    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'image',
        'remember_token',
        'date_of_birth',
        'mobile',
        'gender'
    ];

    public function getFullNameAttribute(){
        return $this->firstname . " " . $this->lastname ;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function image(){
        return  $this->hasOne(Image::class);
    }

}
