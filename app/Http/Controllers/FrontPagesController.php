<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    
    public function home(){
        $title='Wave Cafee';
        return view('index',compact('title'));
    }


    public function aboutUs(){
        $title='About our Cafe';
        return view('aboutUs',compact('title'));
    }

    public function specialItems(){
        $title='Our Special Items';
        return view('specialItems',compact('title'));
    }
    public function contact(){
        $title='Contact with Us';
        return view('contact',compact('title'));
    }


    public function drinkMenu(){
       
        $title='Drink Menu';
        return view('drinkMenu',compact('title'));
    }
}
