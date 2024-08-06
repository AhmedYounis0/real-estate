<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{

    public function paypal(Request $request)
    {
        $package = Package::find($request->package_id);

        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));


        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('agent.payment.success', ['package' => $package]),
                "cancel_url" => route('agent.payment.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $package->price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('agent.payment.cancel');
        }
    }

    public function success(Request $request)
    {
        $package = Package::find($request->package);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

            $user = Auth::user();

            Order::create([
                    'user_id' => $user->id,
                    'package_id' => $package->id,
                    'amount' => $package->price,
                    'order_no' => uniqid(),
                    'payment_method' => 'PayPal',
                    'purchase_date' => now(),
                    'expire_date' => now()->addDays($package->duration),
                    'status' => 'active',
                    'credit' => $package->properties_allowed
                ]);

            return to_route('agent.orders');
        } else {
            return redirect()->route('agent.payment.cancel');
        }
    }

    public function cancel()
    {
        return response()->json('Payment Cancelled', 402);
    }
}

