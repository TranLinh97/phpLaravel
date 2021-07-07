<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestUpdateInfo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function updateInfo()
    {
        return view('user.update_info');
    }

    public function saveUpdateInfo(UserRequestUpdateInfo $request)
    {
        $data = $request->except('_token');
        $user = User::find(\Auth::id());
        $user->update($data);
        return redirect()->back();
    }
}
