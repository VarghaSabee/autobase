<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Autobuses;
use App\Models\Booking;
use App\Models\Cities;
use App\Models\Drivers;
use App\Models\Routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['payments'] = Booking::where(['status' => 1])->get()->count();
        $data['routes'] = Routes::count();
        $data['bookings'] = Booking::count();
        $data['autobuses'] = Autobuses::count();
        $data['drivers'] = Drivers::count();
        $data['cities'] = Cities::count();

        return view('admin.index',['data'=>json_encode($data)]);
    }
}