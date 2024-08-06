<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'FAQ';
        $faqs = Faq::all();
        return view('theme.faq', compact('title', 'faqs'));
    }
}
