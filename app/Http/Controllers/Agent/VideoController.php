<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Property;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index($property_id)
    {
        $property = Property::find($property_id)->select('id','user_id')->first();

        if (Auth::user()->id == $property->user_id)
        {
            $title = 'Videos';
            $videos = $property->videos;
            return view('theme.agent.videos', compact('title', 'videos', 'property'));
        }
        abort(403);
    }

    public function store(Request $request, $property_id)
    {
//        $property = Property::where('id', $property_id)->select('id','user_id','order_id')->first();

        $property = Property::with([
            'user' => function($query) {
                $query->select('id'); // Select only the 'id' column from users
            },
            'order' => function($query) {
                $query->select('id', 'user_id', 'package_id'); // Select specific columns from orders
            },
            'order.package' => function($query) {
                $query->select('id', 'videos_allowed'); // Select specific columns from packages
            },
            'videos' => function($query) {
                $query->select('id', 'property_id'); // Select specific columns from videos
            }
        ])->select('id', 'user_id', 'order_id')->findOrFail($property_id);

        if (Auth::user()->id == $property->user_id)
        {
            $maxVideos = Order::with('package')
                ->where('user_id','=',Auth::user()->id)
                ->where('status','=','active')
                ->where('id','=',$property->order_id)
                ->first();

            $maxVideos = $maxVideos->package->videos_allowed;

            $remainingVideos = $maxVideos - $property->videos->count();

            if ($remainingVideos <= 0)
            {
                return redirect()->back()->with('status','You have already uploaded the maximum number of videos for this property.');
            }

            $data = $request->validate([
                'name' => "required|string",
            ]);

            Video::create([
               'property_id' => $property->id,
               'name' => $data['name'],
            ]);

            return redirect()->back()->with('status','Videos successfully uploaded.');
        }
        abort(403);
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        $video->delete();

        return redirect()->back()->with('status','Video successfully deleted.');
    }

}
