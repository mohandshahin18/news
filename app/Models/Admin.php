<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles;

    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type','actor_id','id');
    }

    public function getFullNameAttribute(){
        return $this->user->firstname . " " . $this->user->lastname ;
    }

    public function getImageAttribute(){
        return $this->user->image ;
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($admin) {
            $admin->user()->delete();

        });
    }



}
