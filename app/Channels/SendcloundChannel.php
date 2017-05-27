<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/27
 * Time: 上午7:15
 */

namespace App\Channels;


use Illuminate\Notifications\Notification;

class SendcloundChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSendcloud($notifiable);
    }
}