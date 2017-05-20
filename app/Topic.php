<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Topic
 *
 * @property int $id
 * @property string $name
 * @property string $bio
 * @property int $questions_count
 * @property int $followers_count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Question[] $questions
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereBio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereFollowersCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereQuestionsCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    protected $fillable = ['name','bio','questions_count'];

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
