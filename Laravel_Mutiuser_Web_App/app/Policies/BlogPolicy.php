<?php

namespace App\Policies;

use App\User;
use App\blog;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any blogs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \App\User  $user
     * @param  \App\blog  $blog
     * @return mixed
     */
    public function before($user)
{
    if ($user->email === 'admin@admin.com') {
        return true;
    }
}
    public function view(User $user, blog $blog)
    {
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       // return in_array($user->email,[
           // 'admin@admin.com',
       // ]);
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\User  $user
     * @param  \App\blog  $blog
     * @return mixed
     */
    public function update(User $user, blog $blog)
    {
        return $user->id === $blog->user_id;
        Response::allow();
         Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\User  $user
     * @param  \App\blog  $blog
     * @return mixed
     */
    public function delete(User $user, blog $blog)
    {
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can restore the blog.
     *
     * @param  \App\User  $user
     * @param  \App\blog  $blog
     * @return mixed
     */
    public function restore(User $user, blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the blog.
     *
     * @param  \App\User  $user
     * @param  \App\blog  $blog
     * @return mixed
     */
    public function forceDelete(User $user, blog $blog)
    {
        //
    }
}
