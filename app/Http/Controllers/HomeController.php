<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Stream;
use App\Models\Video;
use Illuminate\Http\Request;

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
    public function index()
    {
        $pictures = Picture::all();
        $videos = Video::all();
        $streams = Stream::all();
        return view('home')->with(['videos' => $videos, 'pictures' => $pictures, 'streams' => $streams,]);
    }
    
}
