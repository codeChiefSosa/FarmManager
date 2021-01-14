<?php

namespace App\Policies;

use App\User;
use App\Animal;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function update(User $user, Animal $model)
    {
        return $user->id == $model->user_id;
    }
}
