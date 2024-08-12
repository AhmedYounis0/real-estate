<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Models\Term;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $title = 'Privacy Policy';
        $privacy = Privacy::all();
        return view('theme.privacy', compact('title','privacy'));
    }

}
