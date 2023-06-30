<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apikey;
use App\Models\Timespent;
use Illuminate\Http\Request;

class TimespentController extends Controller
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

        $timespent = Timespent::create([
            'website_url' => $request->website_url,
            'totaltime' => $request->totaltime
        ]);

        $user->durations()->save($timespent);

        if($timespent){
            return response()->json(["message" => "Saved to server"]);
        }

        return response()->json(["message" => "error in saving timespent"]);
    }

    public function show(Timespent $timespent)
    {
        //
    }

    public function edit(Timespent $timespent)
    {
        //
    }

    public function update(Request $request, Timespent $timespent)
    {
        //
    }

    public function destroy(Timespent $timespent)
    {
        //
    }
}
