<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    public function create()
    {
        $title = 'Register';
        return view('theme.user.register', compact('title'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['role'] = 'user';

        $user = User::create($data);

        Auth::login($user);

        return to_route('theme.index');
    }
}
