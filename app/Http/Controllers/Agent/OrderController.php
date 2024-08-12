<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Orders';
        $orders = Order::with('package')
            ->where('user_id' , Auth::id())
            ->orderBy('id' ,'desc')
            ->get();
        return view('theme.agent.orders', compact('title','orders'));
    }
}
