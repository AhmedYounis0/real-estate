<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'property_id' => $request->property_id
        ]);
        return response()->json(['message' => 'Added to wishlist']);
    }

    public function destroy(Request $request)
    {
        $propertyId = $request->input('property_id');

        // Ensure the user is authenticated
        if (Auth::check()) {

            $user = Auth::user();

            Wishlist::where('user_id', $user->id)->where('property_id', $propertyId)->delete();

            return response()->json(['success' => true, 'message' => 'Property removed from wishlist.']);
        }

        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

}
