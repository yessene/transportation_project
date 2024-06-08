<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use DB;
use App\Models\travel;
use App\Models\driver;
use App\Models\Client;
use App\Models\vehicle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // home page
    public function index()
    {
        $allvehicles = DB::table('vehicles')->count();
        $alltravels = DB::table('travels')->count();
        $alldrivers = DB::table('drivers')->count();
        $allClients = DB::table('clients')->count();
        $today = now()->startOfDay();
        $expiredvehicles = vehicle::whereDate('validite_date', '<', $today)->get();
        $arrivedtravels = travel::whereDate('date_arrivee', '<', $today)->get();
    

        return view('dashboard.home', compact('allvehicles', 'expiredvehicles', 'alltravels', 'alldrivers', 'allClients','arrivedtravels'));

    }

    // profile
    public function profile()
    {
        return view('profile');
    }
}
