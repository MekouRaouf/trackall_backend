<?php

namespace App\Http\Controllers;

use App\Models\Apikey;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stringable;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['authenticated']);
    }

    public function dashboard(){
        $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();

        $fingerprintsByOs = $user->fingerprints()->get()->groupBy('browsername');

        // dd($fingerprintsByOs);

        return view("dashboard");
    }

    public function fingerprints_page(){
        $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();

        $fingerprints = $user->fingerprints()->orderBy('id', 'DESC')->paginate(5);

        return view('fingerprints', compact('fingerprints'));
    }

    public function geolocations_page(){
        $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();

        $geolocations = $user->geolocations()->get();

        return view('geolocations', ['geolocations' => $geolocations]);
    }

    public function durations_page(){
        $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();
        
        $durations = $user->durations()->get();

        return view('durations', ['durations' => $durations]);
    }

    public function parameters_page(){
        $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();

        return view("parameters", [
            'website' =>  $user,
            'api_key' => $user->api_keys()->orderBy('id', 'DESC')->first()
        ]);        
    }
    
    public function generate_api_key(){
        $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();

        // Generate api key
        $generated = bin2hex(random_bytes(30));

        $key = Apikey::create([
            "name" => $user->name.'_api_key',
            "value" => strtoupper($generated)
        ]);

        $user->api_keys()->save($key);

        if($key){
            return redirect()->back()->with('success', 'API Key generated successfully');
        }

        return redirect()->back()->with('error', 'API Key not generated');
    }
}
