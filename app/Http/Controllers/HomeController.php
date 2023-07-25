<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noteList = NoteList::all();
        return view('home', compact('noteList'));
    }
}
