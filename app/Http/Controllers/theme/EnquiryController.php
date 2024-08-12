<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Mail\SendEnquiryToAgent;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|digits:11',
            'message' => 'required|string',
            'property' => 'required|integer|exists:properties,id'
        ],[
            'property.required' => 'Property is required',
            'property.integer' => 'Invalid property.',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'=> 'error',
                'errors' => $validator->errors()
            ],400);
        }

        // Get validated data
        $validatedData = $validator->validated();

        // Retrieve the property
        $property = Property::findOrFail($validatedData['property']);

        // Prepare data for mailing
        $data = array_merge($validatedData, [
            'property_name' => $property->name,
            'agent_email' => $property->user->email
        ]);

        // Send email
        Mail::to($data['agent_email'])->send(new SendEnquiryToAgent($data));

        return response()->json([
            'status' => 'success',
            'message' => 'You have sent message successfully!'
        ]);
    }
}
