<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Follow
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereUserId($value)
 * @mixin \Eloquent
 */
class Follow extends Model
{
    protected $table = 'user_question';

    protected $fillable = ['user_id', 'question_id'];


}
