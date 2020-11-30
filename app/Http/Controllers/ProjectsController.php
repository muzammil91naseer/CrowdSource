<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\projects;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    public function project_details_view(Request $request)
    {
        if(isset($request["project_id"]))
        {
            $project_data = projects::where('id', '=', $request["project_id"])->first();
            return view("project_details",["project_data"=>$project_data]);
        }
        else
        {
            abort(404);
        }
        
    }
    public function add_project_view()
    {
        return view("add_project");
    }

    public function add_project(Request $request)
    {
        info($request);
        $cover_photo_url="";
        $cover_photo_large_url="";
        $cover_photo_medium_url="";
        $profile_photo_url="";
        $team_photo_url="";
        $mytime = Carbon::now();
        $current_time=$mytime->toDateTimeString();
        $current_timestamp = Carbon::now()->timestamp;
        $base_url= env("BASE_URL", " ");
        if ($request->hasFile('cover_photo')) 
        {
            if ($request->file('cover_photo')->isValid()) 
            {
                $validated = $request->validate
                (
                    [
                        'name' => 'string|max:40',
                        'image' => 'mimes:jpeg,png,jpg|max:1014',
                    ]
                );
                $extension = $request->cover_photo->extension();
                $request->cover_photo->storeAs('/public', $validated['name']."-cover_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-cover_photo-".$current_timestamp.".".$extension);
                $cover_photo_url=$base_url.$url;
                info("cover photo url");
                info($cover_photo_url);
            }
        }
        if ($request->hasFile('cover_photo_large')) 
        {
            if ($request->file('cover_photo_large')->isValid()) 
            {
                $validated = $request->validate
                (
                    [
                        'name' => 'string|max:40',
                        'image' => 'mimes:jpeg,png,jpg|max:1014',
                    ]
                );
                $extension = $request->cover_photo->extension();
                $request->cover_photo->storeAs('/public', $validated['name']."-cover_photo_large-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-cover_photo_large-".$current_timestamp.".".$extension);
                $cover_photo_large_url=$base_url.$url;
            }
        }
        if ($request->hasFile('cover_photo_medium')) 
        {
            if ($request->file('cover_photo_medium')->isValid()) 
            {
                $validated = $request->validate
                (
                    [
                        'name' => 'string|max:40',
                        'image' => 'mimes:jpeg,png,jpg|max:1014',
                    ]
                );
                $extension = $request->cover_photo->extension();
                $request->cover_photo->storeAs('/public', $validated['name']."-cover_photo_medium-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-cover_photo_medium-".$current_timestamp.".".$extension);
                $cover_photo_medium_url=$base_url.$url;
            }
        }
        if ($request->hasFile('profile_photo')) 
        {
            if ($request->file('profile_photo')->isValid()) 
            {
                //
                $validated = $request->validate
                ([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png,jpg|max:1014',
                ]);
                $extension = $request->profile_photo->extension();
                $request->profile_photo->storeAs('/public', $validated['name']."-profile_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-profile_photo-".$current_timestamp.".".$extension);
                $profile_photo_url=$base_url.$url;
                info("profile photo url");
                info($profile_photo_url);
            }
        }
        if ($request->hasFile('team_photo')) 
        {
            if ($request->file('team_photo')->isValid()) 
            {
                //
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png,jpg|max:1014',
                ]);
                $extension = $request->team_photo->extension();
                $request->team_photo->storeAs('/public', $validated['name']."-team_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-team_photo-".$current_timestamp.".".$extension);
                $team_photo_url=$base_url.$url;
            }
        }

        projects::create
        (
            [
            'name' => $request['name'],
            'cover_photo_url' => $cover_photo_url,
            'cover_photo_large_url' => $cover_photo_large_url,
            'cover_photo_medium_url' => $cover_photo_medium_url,
            'profile_photo_url' => $profile_photo_url,
            'team_photo_url' => $team_photo_url,
            'idea_video_url' => $request["idea_video_url"],
            'description' => $request['description'],
            'features' => $request['features'],
            'raised_amount'=> $request['raised_amount'],
            'target_amount' => $request['target_amount'],
            'equity_percentage' => $request['equity_percentage'],
            'pre_monthly_valuation' => $request['pre_monthly_valuation'],
            'share_price' => $request['share_price'],
            'idea'=>$request['idea'],
            'team'=>$request['team'],
            'campaign_end_date' => $request['campaign_end_date'],
            'total_investors '=>$request['total_investors '],
            
            ]
        );

        return redirect()->route('home_page');

    }
}
