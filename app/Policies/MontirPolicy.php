<?php

namespace App\Policies;

use App\Models\User;

class MontirPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewMontir(User $user)
    {
        return $user->role === 'montir';
    }
}
