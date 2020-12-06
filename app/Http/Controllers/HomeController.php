<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_details;
use App\Models\projects;
use Monarobase\CountryList\CountryListFacade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $row = user_details::where('user_id', '=', $user_id)->first();
        info($row);
        if(isset($row))
        {
            $projects_all = projects::paginate(12);
            $projects_all_array=$projects_all->toArray();
            return view('home',["message"=>"","projects_all"=>$projects_all,"projects_all_array"=>$projects_all_array]);

        }
        else
        {
            return redirect()->route('get_user_details_view');
        }

    }
}
