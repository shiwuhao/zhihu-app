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


    /**
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function byId($id)
    {
        return Answer::find($id);
    }
}