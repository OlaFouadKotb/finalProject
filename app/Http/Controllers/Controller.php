<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

     
    public function home(){
        $title='wafe cafee';
        return view('homeSite',compact('title'));
    }
    public function drinkMenu(){
        $title='Drink Menu';
        return view('drink',compact('title'));
    }


    public function about(){
        $title='About Us';
        return view('about',compact('title'));
    }

    public function special(){
        $title='Special Items';
        return view('specialItems',compact('title'));
    }

    public function contact(){
        $title='Contact with us';

        return view('contactUs',compact('title'));
    }

}
