<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * token 验证
     * @param $token
     */
    public function verify($token)
    {
        $user = User::where('confirmation_token', $token)->first();


        if (is_null($user)) {

            flash('邮箱不能为空', 'danger');
            redirect('/');
        }

        $user->is_active = 1;
        $user->confirmation_token = str_random(40);
        $user->save();

        \Auth::login($user);

        flash('激活成功', 'success');
        return redirect('/home');
    }
}
