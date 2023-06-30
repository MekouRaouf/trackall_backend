<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apikey;
use App\Models\BrowserFingerprint;
use App\Models\User;
use Illuminate\Http\Request;

class BrowserFingerprintController extends Controller
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

        $fingerprint = BrowserFingerprint::create([
            "website_url" => $request->input("website_url"),
            "useragent" => $request->input("useragent"),
            "browsername" => $request->input("browsername"),
            "connection_type" => $request->input("connection_type"),
            "languages" => $request->input("languages"),
            "selected_language" => $request->input("selected_language"),
            "cookies" => $request->input("cookies"),
            "processorcores" => $request->input("processorcores"),
            "ram_memory" => $request->input("ram_memory"),
            "screenW" => $request->input("screenW"),
            "screenH" => $request->input("screenH")
        ]);

        $user->fingerprints()->save($fingerprint);

        if($fingerprint){
            return response()->json(["message" => "Saved to server"]);
        }

        return response()->json(["message" => "error in saving fingerprint"]);
    }

    public function show(BrowserFingerprint $browserFingerprint)
    {
        //
    }

    public function edit(BrowserFingerprint $browserFingerprint)
    {
        //
    }

    public function update(Request $request, BrowserFingerprint $browserFingerprint)
    {
        //
    }

    public function destroy(BrowserFingerprint $browserFingerprint)
    {
        //
    }
}
