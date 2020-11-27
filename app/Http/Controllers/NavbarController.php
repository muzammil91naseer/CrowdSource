<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function investment_opportunities()
    {
        // data array will be filled with investment opportunities information
        $data=array();
        return view('explore/investment_opportunities',["data" => $data]);
    }

    public function investing()
    {
        // data array will be filled with investing information
        $data=array();
        return view('explore/investing',["data" => $data]);
    }

    public function raising()
    {
        // data array will be filled with raising information
        $data=array();
        return view('explore/raising',["data" => $data]);
    }

    public function about_us()
    {
        // data array will be filled with about_us information
        $data=array();
        return view('explore/about_us',["data" => $data]);
    }
}
