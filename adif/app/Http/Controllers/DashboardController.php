<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')){
             return view('userdash');
        }elseif(Auth::user()->hasRole('incubator')){
             return view('incubatordash');
        }elseif(Auth::user()->hasRole('admin')){
         return view('dashboard');
    }
    }
 
    public function profile()
    {
     return view('profile');
    }
    public function incubator()
    {
     return view('incubator');
    }
 
    public function about()
    {
     return view('about');
    }
    public function Home()
    {
     return view('Home');
    }
 
 }