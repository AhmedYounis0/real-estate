<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        $title = 'Terms & Conditions';
        $terms = Term::all();
        return view('theme.terms', compact('terms', 'title'));
    }
}
