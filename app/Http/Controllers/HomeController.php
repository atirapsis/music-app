<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

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
    public function index(Request $request)
    {
        $search = $request->input('search', ''); // Get the search input

        // Filter music based on the search input
        $musics = Music::search($search)->paginate($request->input('paginate', 5));

        return view('home', compact('musics', 'search'));
    }
}
