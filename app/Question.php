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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Topic[] $topics
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Question published()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Answer[] $answers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $followers
 */
class Question extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];


    /**
     * 一个问题属于多个话题
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    /**
     * 一个问题属于一个用户关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * scope 查询作用域
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('is_hidden', 'F');
    }


    /**
     * 定义问题与答案一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


    /**
     * 用户关注问题 一对多
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
