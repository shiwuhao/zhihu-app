<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Answer
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property string $body
 * @property int $votes_count
 * @property int $comments_count
 * @property string $is_hidden
 * @property string $close_comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Question $question
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereCloseComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereCommentsCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereIsHidden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereVotesCount($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    protected $fillable = ['user_id', 'question_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
