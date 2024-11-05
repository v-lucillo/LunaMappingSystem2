<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    //


    public function home(){
        
        return view("administrator.home");
    }

    public function barangay(){
        return view("administrator.barangay");
    }


    public function agriculture(){
        return view("administrator.agriculture");
    }


    public function map(){
        return view("administrator.map");
    }

    public function contact(){
        return view("administrator.contact");
    }


    public function about(){
        return view("administrator.about");
    }



}
