<?php

namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class UsersController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {           
        return view('admin.users.index')->with('users',$users);
    }


    public function edit()
    {
        return view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles]);
    }


    public function update(Request $request, UserRepositoryInterface $user)
    {   
        $user->UpdateUser($request,$user);  
        return redirect()->route('admin.users.index');
    }


    public function destroy(Request $request,UserRepositoryInterface $user)
    {
        $user->DeleteUser($request,$user);  
        return redirect()->route('admin.users.index');
    }
}
