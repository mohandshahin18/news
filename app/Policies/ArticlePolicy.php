<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
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
            return auth()->user()->hasPermissionTo('Index-Article')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Article')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Article $article)
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
            return auth()->user()->hasPermissionTo('Create-Article')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Article')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Article')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Article')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Article')
             ?  $this->allow()
             : $this->deny('You cannot access this page');
         }
         elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Article')
             ?  $this->allow()
             : $this->deny(' You cannot access this page');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
