<?php

namespace App\Policies;

use App\Models\Accountant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if (auth()->check() &&  ($user->role == 'Super User' || $user->role == 'Admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accountant  $accountant
     * @return mixed
     */
    public function view(User $user, Accountant $accountant)
    {
        if(auth()->check() && ($user->role == 'Super User' || $user->role == 'Admin' || auth()->user()->id == $accountant->user_id)){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accountant  $accountant
     * @return mixed
     */
    public function update(User $user, Accountant $accountant)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accountant  $accountant
     * @return mixed
     */
    public function delete(User $user, Accountant $accountant)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accountant  $accountant
     * @return mixed
     */
    public function restore(User $user, Accountant $accountant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accountant  $accountant
     * @return mixed
     */
    public function forceDelete(User $user, Accountant $accountant)
    {
        //
    }
}
