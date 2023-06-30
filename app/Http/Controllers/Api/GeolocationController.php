<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apikey;
use App\Models\Geolocation;
use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $api_key = Apikey::where('value', $request->api_key)->first();
        $user = $api_key->user()->first();

        $position = Geolocation::create([
            "website_url" => $request->website_url,
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
            "altitude" => $request->altitude
        ]);

        $user->geolocations()->save($position);

        if($position){
            return response()->json(["message" => "Saved to server"]);
        }

        return response()->json(["message" => "error in saving geolocation"]);
    }

    public function show(Geolocation $geolocation)
    {
        //
    }

    public function edit(Geolocation $geolocation)
    {
        //
    }

    public function update(Request $request, Geolocation $geolocation)
    {
        //
    }

    public function destroy(Geolocation $geolocation)
    {
        //
    }
}
