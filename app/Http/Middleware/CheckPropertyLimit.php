<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPropertyLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $activePackage = Order::where('user_id',$user->id)
            ->where('status','=','active')
            ->exists();
//        dd($activePackage);
//        foreach ($activePackage as $package) {
//            dd($package);
//        }
//        dd($activePackage->orders->name);
        $creditExceeded = true;

        foreach ($user->orders as $order) {
            if (!$order->credit <= 0) {
                $creditExceeded = false;
//                break;
            }
        }
//        dd($order);


        if (!$activePackage)
        {
            return redirect()->back()->with('status','You dont have a package at the moment');
        }

        if ($creditExceeded)
        {
            return redirect()->back()->with('status','You have reached package limit');
        }
        return $next($request);
    }
}
