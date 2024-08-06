<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Location;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->validate([
            'name'          => 'nullable|String',
            'location_id'   => 'nullable|exists:locations,id',
            'type_id'       => 'nullable|exists:types,id',
            'purpose'       => 'nullable|string',
            'bedroom'       => 'nullable|numeric',
            'bathroom'      => 'nullable|numeric',
            'min_price'     => 'nullable|integer',
            'max_price'     => 'nullable|integer'
        ]);

        $title = 'Property Listing';
        $locations = Location::all();
        $types = Type::all();
        $amenities = Amenity::all();
        $name       = $request->name;
        $location   = $request->location_id;
        $type       = $request->type_id;

        if ($request->has('purpose') || $request->has('amenity') || $request->has('bedroom') || $request->has('bathroom') || $request->has('min_price') || $request->has('max_price'))
        {
            $purpose    = $request->purpose;
            $amenity    = $request->amenity_id;
            $bedroom    = $request->bedroom;
            $bathroom   = $request->bathroom;
            $min_price  = $request->min_price;
            $max_price  = $request->max_price;

            $result = Property::query()
                ->when($name, function($query, $name) {
                    return $query->where('name', 'like', '%' . $name . '%');
                })
                ->when($location, function($query, $location) {
                    return $query->where('location_id', 'like', '%' . $location . '%');
                })
                ->when($type, function($query, $type) {
                    return $query->where('type_id', 'like', '%' . $type . '%');
                })
                ->when($purpose, function($query, $purpose) {
                    return $query->where('purpose', 'like', '%' . $purpose . '%');
                })
                ->when($bedroom, function($query, $bedroom) {
                    return $query->where('bedroom', 'like', '%' . $bedroom . '%');
                })
                ->when($bathroom, function($query, $bathroom) {
                    return $query->where('bathroom', 'like', '%' . $bathroom . '%');
                })
                ->when($min_price !== null && $max_price !== null, function($query) use ($min_price, $max_price) {
                    return $query->whereBetween('price', [$min_price, $max_price]);
                })
                ->orderBy('is_featured', 'DESC')
                ->get();
        } else {
            if (empty($name) && empty($location) && empty($type))
            {
                $result = Property::with(['location','type'])
                    ->whereNotNull('order_id')
                    ->orderBy('is_featured','DESC')
                    ->paginate(6);
            } else {
                $result = Property::where('name','like','%'.$name.'%')
                    ->where('location_id','like','%'.$location.'%')
                    ->where('type_id','like','%'.$type.'%')
                    ->orderBy('is_featured','DESC')
                    ->get();
            }
        }

        return view('theme.search.index', compact(
            'result',
            'title',
            'locations',
            'types',
            'amenities',
        ));
    }
}
