<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function edit()
    {
        $title = 'Edit Profile';
        return view('theme.user.profile', compact('title'));
    }
}
