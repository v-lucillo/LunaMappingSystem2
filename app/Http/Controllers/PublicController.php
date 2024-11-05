<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function home(){
        
        return view("view_only.home");
    }

    public function barangay(){
        return view("view_only.barangay");
    }


    // public function councilor(){
    //     return view("view_only.councilor");
    // }

    public function agriculture(){
        return view("view_only.agriculture");
    }


    public function map(){
        return view("view_only.map");
    }

    public function contact(){
        return view("view_only.contact");
    }


    public function about(){
        return view("view_only.about");
    }


   
}
