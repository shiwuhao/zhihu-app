<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('img');
        $filename = '/avatars/'.md5(time().user()->id).'.'.$file->getClientOriginalExtension();

        \Storage::disk('qiniu')->put($filename, fopen($file->getRealPath(), 'r'));

        user()->avatar = 'http://'.config('filesystems.disks.qiniu.domain').'/'.$filename;
        user()->save();

        return ['url' => user()->avatar];
    }

    public function changeAvatarLocal(Request $request)
    {
        $file = $request->file('img');
        $filename = md5(time().user()->id).'.'.$file->getClientOriginalExtension();
        $filePath = public_path('avatars');



        $file->move($filePath, $filename);

        user()->avatar = '/avatars/'.$filename;
        user()->save();

        return ['url' => user()->avatar];
    }
}
