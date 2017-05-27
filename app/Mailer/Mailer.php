<?php

namespace App\Mailer;
use Mail;
use Naux\Mail\SendCloudTemplate;

/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/27
 * Time: 上午7:45
 */
class Mailer
{

    public function sendTo($template, $email, array $data)
    {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message) use ($email) {
            $message->from('360095002@qq.com', 'Laravist');
            $message->to($email);
        });
    }
}