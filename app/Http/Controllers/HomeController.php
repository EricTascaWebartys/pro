<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimony;
use App\Models\Product;
use App\Models\Work;
use App\Models\Staff;
use App\Models\Information;
use App\Models\Demo;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    // public function index()
    // {
    //     return view('home');
    // }
    public function index() {
        if(Auth::user()->is_connected === null) {
            Auth::user()->is_connected = 1;
            Auth::user()->save();
        }
        $devs = User::where("role", 'ROLE_DEV')->where("is_connected", 1)->get();
        $devs->count() > 0 ? $dev_connected = 1 : $dev_connected = null;
        $information = Information::where('name', 'info')->first();
        $members = User::where('role', "ROLE_CLIENT")->count();
        $number_products = Product::all()->count();
        $products = Product::all();
        $percent_profil = intval(Auth::user()->profile_complete());
        return view('back.home',[
            'information' => $information,
            'members' => $members,
            'number_products' => $number_products,
            'products' => $products,
            'percent_profil' => $percent_profil,
            'dev_connected' => $dev_connected,
            'home' => true
        ]);
    }
}
