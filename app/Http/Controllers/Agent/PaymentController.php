<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Payment';
        $orders = Order::with('package')->where(['user_id' => Auth::id(),'status' => 'active'])->get();
        $packages = Package::select('id','name','price','duration')->get();
        return view('theme.agent.payment', compact('title','packages','orders'));
    }
}
