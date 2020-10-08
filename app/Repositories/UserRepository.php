<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository extends UserRepositoryInterface
{

    public function DeleteUser(User $user)
    {
        $user->roles()->detach();
        $user->delete();
    }


    public function UpdateUser(Request $request, User $user)
    {
      return $user->roles()->sync($request->roles);
    }
}