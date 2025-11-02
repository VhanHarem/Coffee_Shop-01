<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('Pages/home');
    }
    public function categories()
    {
        return view('Pages/categories');
    }
    public function orders()
    {
        return view('Pages/orders');
    }
    public function stamps()
    {
        return view('Pages/stamps');
    }
    public function profile()
    {
        return view('Pages/profile');
    }
}
