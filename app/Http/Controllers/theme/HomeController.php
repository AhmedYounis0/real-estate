<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Choose;
use App\Models\Location;
use App\Models\Property;
use App\Models\Testimonial;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $locations = Location::withCount('properties')
            ->orderBy('properties_count', 'desc')
            ->take(8)
            ->get();
        $testimonials = Testimonial::all();
        $blogs = Blog::all();
        $chooses = Choose::all();
        $types = Type::all();
        $agents = User::where('role','agent')
            ->select('name','image','slug')
            ->take(8)
            ->get();
        $properties = Property::with(['location','type'])
            ->whereNotNull('order_id')
            ->orderBy('is_featured','DESC')
            ->get()
            ->take(6);
        return view('theme.index',compact(
            'locations',
            'testimonials',
            'blogs',
            'agents',
            'chooses',
            'types',
            'properties'
        ));
    }
}
