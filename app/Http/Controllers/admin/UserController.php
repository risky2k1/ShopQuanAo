<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()->get();

        return view('admin.user.index',[
            'user'=>$user,

        ]);
    }
}
