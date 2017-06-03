<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/3
 * Time: 下午5:12
 */

namespace App\Repositories;


use App\Topic;

class TopicRepository
{
    public function getTopiccForTagging($request)
    {
        $topics = Topic::select('id', 'name')->where('name', 'like', "%{$request->q}%")->get();

        return $topics;
    }
}