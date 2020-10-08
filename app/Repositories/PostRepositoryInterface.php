<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
      public function storePost($request,$user);

      public function updatePost($request,$user);

      public function storePodeletePost($request,$user);

}