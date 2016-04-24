<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showIndex()
    {
        return view('home');
    }

    /**
     * Show the about page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showAbout()
    {
        return view('about');
    }

    /**
     * Show the services page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showServices()
    {
        return view('services');
    }

    /**
     * Show portfolio page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showPortfolio()
    {
        return view('portfolio');
    }

    /**
     * Show blog page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showBlog()
    {
        return view('blog');
    }

    /**
     * Show basement page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showBasement()
    {
        return view('basement');
    }

    /**
     * Show contact page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showContact()
    {
        return view('contact');
    }
}
