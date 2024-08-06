<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\StoreAgentRequest;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentRegisterController extends Controller
{
    public function create()
    {
        $title = 'Register As Agent';
        return view('theme.agent.register',compact('title'));
    }

    public function store(StoreAgentRequest $request)
    {
        $data = $request->validated();

        $data['role'] = 'agent';

        $user = User::create($data);

        $package = Package::where('id','1')->firstOrFail();

        Order::create([
            'user_id'       => $user->id,
            'package_id'    => $package->id,
            'order_no'      => uniqid(),
            'payment_method'=> '',
            'purchase_date' => now(),
            'expire_date'   => now()->addDays($package->duration),
            'credit'        => 2,
            'status'        => 'active'
        ]);

        Auth::login($user);

        return to_route('theme.index');
    }

}
