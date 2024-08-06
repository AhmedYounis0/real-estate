<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('theme.user.dashboard', compact('title'));
    }
}
