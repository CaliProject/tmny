<?php

namespace App\Http\Controllers;

use App\Configuration;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showIndex()
    {
        $slogan = Configuration::contact()->details->slogan;
        $site = Configuration::site();
        
        return view('home', compact('slogan', 'site'));
    }

    /**
     * Show the about page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showAbout()
    {
        $about = Configuration::about();
        
        return view('about', compact('about'));
    }

    /**
     * Show the services page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showServices()
    {
        $services = Configuration::services();

        return view('services', compact('services'));
    }

    /**
     * Show portfolio page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showPortfolio()
    {
        $portfolio = Configuration::portfolio();

        return view('portfolio', compact('portfolio'));
    }

    /**
     * Show blog page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showBlog()
    {
        $blog = Configuration::blog();
        $blog->posts = array_reverse($blog->posts);

        return view('blog', compact('blog'));
    }

    /**
     * Show basement page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showBasement()
    {
        $basement = Configuration::basement();

        return view('basement', compact('basement'));
    }

    /**
     * Show contact page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showContact()
    {
        $contact = Configuration::contact();
        
        return view('contact', compact('contact'));
    }
}
