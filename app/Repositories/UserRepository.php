<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function UpdateUser(Request $request, User $user)
    {
        return $user->roles()->sync($request->roles);
    }
}