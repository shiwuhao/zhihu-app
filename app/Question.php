<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Question
 *
 * @property int $id
 * @property string $title 标题
 * @property string $body
 * @property int $user_id
 * @property int $comments_count
 * @property int $followers_count
 * @property int $answers_count
 * @property string $close_comment
 * @property string $is_hidden
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereAnswersCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereCloseComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereCommentsCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereFollowersCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereIsHidden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereUserId($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }
}
