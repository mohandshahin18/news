<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index-City')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-City')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }



        // return $admin->hasPermissionTo('Index-City') ?
        // $this->allow() : $this->deny('You cannot access this page');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, City $city)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create-City')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-City')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }


        // return $admin->hasPermissionTo('Create-City' ) ?
        // $this->allow() : $this->deny('You cannot access this page');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( )
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }


        // return $admin->hasPermissionTo('Edit-City' ) ?
        // $this->allow() : $this->deny('You cannot access this page');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }

        // return $admin->hasPermissionTo('Delete-City' ) ?
        // $this->allow() : $this->deny('You cannot access this page');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, City $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, City $city)
    {
        //
    }
}
