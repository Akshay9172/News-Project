<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
        $languages = Language::all();
        return view('News.addNews', compact('languages'));
    }
    public function Show()
    {

        return view('News.addNews',);
    }
}
