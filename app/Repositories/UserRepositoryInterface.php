<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function DeleteUser($user);

    public function UpdateUser($request,$user);

}