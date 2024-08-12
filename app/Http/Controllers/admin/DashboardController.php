<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Blog;
use App\Models\Location;
use App\Models\Order;
use App\Models\Property;
use App\Models\Subscribe;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Home';
        $totalLocations = Location::count();
        $totalTypes     = Type::count();
        $totalAmenities = Amenity::count();
        $totalProperties= Property::whereNotNull('order_id')->count();
        $totalOrders    = Order::where('status','active')->count();
        $totalSubscribers= Subscribe::count();
        $totalPosts     = Blog::count();
        $totalCustomers = User::where('role','user')->whereNotNull('email_verified_at')->count();
        $totalAgents    = User::where('role','agent')->whereNotNull('email_verified_at')->count();
        return view('admin.index',get_defined_vars());
    }
}
