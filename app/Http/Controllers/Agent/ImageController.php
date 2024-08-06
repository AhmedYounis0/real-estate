<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Order;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($property_id)
    {
        $property = Property::findOrFail($property_id);

        if (Auth::user()->id == $property->user_id)
        {
            $title = 'Photos';
            $images = $property->images;
            return view('theme.agent.images', compact('title','images','property_id'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $property_id)
    {
        $property = Property::where('id', $property_id)->select('id','user_id','order_id')->first();

        $user = Auth::user();
        if ($user->id != $property->user_id) {
            abort(403);
        }

        $maxImages = Order::with('package')
            ->where('user_id', $user->id)
            ->where('status', '=','active')
            ->where('id', $property->order_id)
            ->first();

        $maxImages = $maxImages->package->photos_allowed;

//        $existingImageCount = Image::where('property_id', $property->id)->count();

        $remainingImages = $maxImages - $property->images->count();

        if ($remainingImages <= 0)
        {
            return redirect()->back()->with('status',"You have already uploaded the maximum number of images.");
        }

        $data = $request->validate([
            'images' => "required|array|max:$maxImages",
            'images.*' => "required|image|mimes:jpeg,png,jpg|max:2048",
            'property_id' => "required|exists:properties,id",
        ],[
            'images.max' => "You can only upload a maximum of $maxImages images."
        ]);

        if (count($data["images"]) > $remainingImages)
        {
            return redirect()->back()->with('status',"You can't upload more than $remainingImages images.");
        }

        foreach ($data['images'] as $image)
        {
            $newName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $newName);
            Image::create([
               'property_id' => $property_id,
               'name' => $newName,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        $property = $image->property;

        if (Auth::user()->id == $property->user_id) {

            $image->delete();

            Storage::delete('public/images/'.$image->name);

            return redirect()->back()->with('status','Image successfully deleted.');
        }
        abort(403);
    }
}
