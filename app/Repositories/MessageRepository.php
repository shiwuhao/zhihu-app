<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/2
 * Time: 上午7:17
 */

namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }
}