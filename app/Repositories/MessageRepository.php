<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/2
 * Time: 上午7:17
 */

namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }

    public function getAllMessage()
    {
        $userId = \Auth::id();
        $messages = Message::where('to_user_id', $userId)
            ->orWhere('from_user_id', $userId)
            ->with(['fromUser' =>function($query) {
                return $query->select('id', 'name', 'avatar');
            }, 'toUser' => function($query) {
                return $query->select('id', 'name', 'avatar');
            }])
            ->latest()
            ->get();

        return $messages;
    }

    public function getDialogMessageBy($dialogId)
    {
        return Message::where('dialog_id', $dialogId)->orderBy('id','desc')->get();
    }

    public function getSingleMessageBy($dialogId)
    {
        return Message::where('dialog_id', $dialogId)->first();
    }
}