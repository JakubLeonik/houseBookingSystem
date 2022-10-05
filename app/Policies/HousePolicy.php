<?php

namespace App\Policies;

use App\Models\House;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HousePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user = null)
    {
        return true;
    }

    public function view(User $user = null, House $house)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, House $house)
    {
        if($user->role == 'admin') return true;
        else return $user->id == $house->user_id;
    }

    public function delete(User $user, House $house)
    {
        if($user->role == 'admin') return true;
        return $user->id == $house->user_id;
    }
}
