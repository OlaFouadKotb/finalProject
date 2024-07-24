<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Beverage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()

     {
        $categories = Category::orderBy('created_at', 'desc')->take(3)->with('beverages')->get();
        return view('frontPages.home', compact('categories'));
     }
     
    public function drink()

    {
        $title='wave Cafee Drinks';
        return view('frontPages.drink',compact('title'));
    }
    public function about()

    {
        $title='A bout wave Cafee';
        return view('frontPages.about',compact('title'));
    }
    public function contact()

    {
        $title='wave Cafee - Contact us';
        return view('frontPages.contact',compact('title'));
    }
    public function special()

    {
        $title='wave Cafee - Special Items';
        return view('frontPages.special',compact('title'));
    }
}
