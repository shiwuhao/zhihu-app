<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/3
 * Time: 下午4:50
 */

namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create($attributes)
    {
        return Comment::create($attributes);
    }
}