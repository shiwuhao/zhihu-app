<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/25
 * Time: 上午7:26
 */

namespace App\Repositories;


use App\User;

class UserRepository
{

    public function byId($id)
    {
        return User::find($id);
    }
}