<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository=$userRepository;
    }

    public function index()
    {   
        
        return view('admin.users.index')->with('users',$users);
    }


    public function edit(User $user)
    {
        
        return view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles]);
    }


    public function update(Request $request, User $user)
    {
        

        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {

        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
