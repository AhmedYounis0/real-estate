<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Pricing';
        $packages = Package::all();
        return view('theme.packages', compact('title','packages'));
    }
}
