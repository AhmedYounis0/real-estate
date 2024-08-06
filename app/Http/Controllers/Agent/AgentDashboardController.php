<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentDashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $CountActiveProperties = Property::where('user_id', Auth::user()->id)
            ->whereNotNull('order_id')
            ->count();
        $ActiveProperties = Property::where('user_id', Auth::user()->id)
            ->whereNotNull('order_id')
            ->paginate(10);
        $countActiveFeaturedProperties = Property::where('user_id', Auth::user()->id)
            ->whereNotNull('order_id')
            ->where('is_featured', 1)
            ->count();
        return view('theme.agent.dashboard', compact(
            'title',
            'ActiveProperties',
            'countActiveFeaturedProperties',
            'CountActiveProperties'
        ));
    }
}
