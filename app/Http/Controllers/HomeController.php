<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Rating;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //s $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = json_encode(Cities::all(['id','name']));
        $rating = Rating::orderBy('created_at')->take(3)->get(['id','rating','name','comment']);
        return view('welcome',compact('cities','rating'));
    }
}
