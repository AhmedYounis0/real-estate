<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $wishlistCount = Auth::user()->wishlists()->count();
        return view('theme.user.dashboard', compact('title','wishlistCount'));
    }
}
