<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;

class NavbarController extends Controller
{
    public function investment_opportunities()
    {
        $projects_all = projects::paginate(12);
        $projects_all_array=$projects_all->toArray();
        return view('home',["message"=>"","projects_all"=>$projects_all,"projects_all_array"=>$projects_all_array]);

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
