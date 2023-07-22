<?php

namespace App\Policies;

use App\Models\Daily;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class DailyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can show the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user, Daily $daily)
    {
        if($daily->user_id === Auth::id()){
            return true;
        }else if($daily->user()->first()->followings()->where('followee_user_id', $user->id)->exists()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can edit the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $user, Daily $daily)
    {
        if($daily->user_id === Auth::id()){
            return true;
        }else if($daily->user()->first()->followings()->where('followee_user_id', $user->id)->exists()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Daily $daily)
    {
        if($daily->user_id === Auth::id()){
            return true;
        }else if($daily->user()->first()->followings()->where('followee_user_id', $user->id)->exists()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Daily $daily)
    {
        return $daily->user_id === Auth::id();
    }
}
