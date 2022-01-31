<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function mypage(){
        return view('profile/mypage');
    }

    public function edit(){
        return view('profile/edit');
    }

    public function updatePassword(){
        return view('profile/update-password');
    }
}
