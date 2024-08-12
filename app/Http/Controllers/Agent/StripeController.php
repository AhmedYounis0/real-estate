<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $package = Package::find($request->package_id);

        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $package->name,
                    ],
                    'unit_amount' => $package->price * 100,
                ],
                'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('agent.stripe.success',['package' => $package]),
            'cancel_url' => route('agent.stripe.cancel'),
        ]);
        return redirect($response->url);
    }

    public function success(Request $request)
    {

        $package = Package::find($request->package);

        $user = Auth::user();

        Order::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'amount' => $package->price,
            'order_no' => uniqid(),
            'payment_method' => 'Stripe',
            'purchase_date' => now(),
            'expire_date' => now()->addDays($package->duration),
            'status' => 'active',
            'credit' => $package->properties_allowed
        ]);
        return to_route('agent.orders');
    }

    public function cancel()
    {
        dd('x');
    }

}
