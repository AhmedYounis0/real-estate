<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'email' => 'required|email|unique:subscribes',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'=> 'error',
                'errors' => $validator->errors()
            ],400);
        }

        Subscribe::create($request->only('email'));

        return response()->json([
            'status' => 'success',
            'message' => 'You have successfully subscribed!'
        ]);
    }
}
