<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function dashboard()
    {
        return view('admin.page.dashboard');
    }

    public function about()
    {

        return view('about');
    }

    public function contact()
    {

        return view('contact');
    }
}
