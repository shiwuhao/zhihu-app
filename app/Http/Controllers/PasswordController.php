<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function password()
    {
        return view('users.password');
    }

    public function update(ChangePasswordRequest $request)
    {
        if (\Hash::check($request->old_password, user()->password)) {
            user()->password = bcrypt($request->password);
            user()->save();
            flash('密码修改成功', 'success');

            return back();
        }

        flash('密码修改失败', 'danger');

        return back();

    }
}
