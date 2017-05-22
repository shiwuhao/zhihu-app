<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/21
 * Time: 下午11:46
 */

namespace App\Repositories;


use App\Question;
use App\Topic;

/**
 * Class QuestionRepository
 * @package App\Repositories
 */
class QuestionRepository
{

    /**
     * 获取问题详情 并获取话题
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function byIdWithTopics($id)
    {
        return Question::where('id', $id)->with('topics')->first();
    }

    /**
     * 创建一个问题
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        return Question::create($attributes);
    }

    /**
     * 生成话题
     * @param array $topics
     */
    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if (is_numeric($topic)) {
                Topic::find($topic)->increment('questions_count');
                return (int)$topic;
            }

            $newTopic = Topic::create(['name' => $topic, 'questions_count' => 1]);
            return $newTopic->id;
        })->toArray();
    }


    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function byId($id)
    {
        return Question::find($id);
    }
}