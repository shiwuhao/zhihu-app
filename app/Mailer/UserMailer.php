<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/27
 * Time: 上午7:50
 */

namespace App\Mailer;


class UserMailer extends Mailer
{

    /**
     * 用户关注发送邮件通知
     * @param $email
     */
    public function followNotifyEmail($email)
    {
        $data = ['url' => url('http://zhihu.dev'), 'name' => \Auth::guard('api')->user()->name];

        $this->sendTo('zhihu_app_new_user_follow', $email, $data);
    }
}