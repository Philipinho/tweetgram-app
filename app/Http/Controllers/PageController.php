<?php

namespace App\Http\Controllers;

class PageController
{
    public function terms()
    {
        $withh = array('title' => 'Terms of Service');
        return view('terms')->with($withh);
    }

    public function privacy()
    {
        $withh = array('title' => 'Privacy Policy');
        return view('privacy')->with($withh);
    }
}
