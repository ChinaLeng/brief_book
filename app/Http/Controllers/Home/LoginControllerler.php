<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginControllerler extends Controller
{
    //
    public function index(){
        return view('login.index');
    }
}
