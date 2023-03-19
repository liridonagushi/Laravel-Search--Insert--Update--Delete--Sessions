<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
     // php artisan make:controller PagesController
    // write function
    public function index(){
        return view('pages.index');
    }

    public function about(){
        // $title = "About Us Page controller";
        // $body = "Body Page controller";
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

        public function users($id, $cop){
        $name= "Users name ". $id." COP " .$cop;
        return view('pages.users', compact('name'));
    }
}
