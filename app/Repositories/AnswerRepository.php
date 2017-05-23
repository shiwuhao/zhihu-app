<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/23
 * Time: 上午6:24
 */

namespace App\Repositories;


use App\Answer;

class AnswerRepository
{

    /**
     * 创建一个答案
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return Answer::create($attributes);
    }
}