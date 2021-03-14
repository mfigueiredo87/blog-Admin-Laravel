<?php

namespace App\Policies;

use App\Model\Admin\admin;
use App\Model\user\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(admin $user, post $post)
    {
        // foreach ($user->roles as $role) {
        //    foreach ($role->permission as $permission) {
        //       if($permission->id == 12)
        //    }
        // }
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
         foreach ($user->roles as $role) {
           foreach ($role->permissions as $permission) {
              if($permission->id == 12){
                return true;
              }
                return false;
           }
        }
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(admin $user, post $post)
    {
        //
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(admin $user, post $post)
    {
        //
    }
}
