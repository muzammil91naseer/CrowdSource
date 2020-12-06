<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\team_members;
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
            $team_members_obj = team_members::where('project_id', '=', $request["project_id"])->get();
            $team_members_array=$team_members_obj->toArray();
            if(isset($project_data) && isset($team_members_array))
            {
                return view("project_details",["project_data"=>$project_data,"team_members"=>$team_members_array]);
            }
            else if (isset($project_data))
            {
                return view("project_details",["project_data"=>$project_data,"team_members"=>""]);
            }
            else if (isset($team_members_array))
            {
                return view("project_details",["project_data"=>"","team_members"=>$team_members_array]);
            }
            else
            {
                abort(404);
            }

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

    public function add_team_members_view(Request $request)
    {
        return view("add_team_members",["request"=>$request]);
    }

    public function add_project(Request $request)
    {
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
                $validated['name'] = preg_replace('/\s+/', '_', $validated['name']);
                $extension = $request->cover_photo->extension();
                $request->cover_photo->storeAs('/public', $validated['name']."-cover_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-cover_photo-".$current_timestamp.".".$extension);
                $cover_photo_url=$base_url.$url;
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
                $validated['name'] = preg_replace('/\s+/', '_', $validated['name']);
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
                $validated['name'] = preg_replace('/\s+/', '_', $validated['name']);
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
                $validated['name'] = preg_replace('/\s+/', '_', $validated['name']);
                $extension = $request->profile_photo->extension();
                $request->profile_photo->storeAs('/public', $validated['name']."-profile_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-profile_photo-".$current_timestamp.".".$extension);
                $profile_photo_url=$base_url.$url;
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
                $validated['name'] = preg_replace('/\s+/', '_', $validated['name']);
                $extension = $request->team_photo->extension();
                $request->team_photo->storeAs('/public', $validated['name']."-team_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-team_photo-".$current_timestamp.".".$extension);
                $team_photo_url=$base_url.$url;
            }
        }

        $project_id=projects::create
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
            'total_investors'=>$request['total_investors'],

            ]
        )->id;

        return redirect()->route('add_team_members_view', ['project_id'=>$project_id,"count"=>1]);

    }
    public function add_team_members(Request $request)
    {
        info($request);
        $mytime = Carbon::now();
        $current_time=$mytime->toDateTimeString();
        $current_timestamp = Carbon::now()->timestamp;
        $base_url= env("BASE_URL", " ");

        $member_photo_url="";

        if ($request->hasFile('member_photo'))
        {
            if ($request->file('member_photo')->isValid())
            {
                $validated = $request->validate
                (
                    [
                        'name' => 'string|max:40',
                        'image' => 'mimes:jpeg,png,jpg|max:1014',
                    ]
                );
                $validated['name'] = preg_replace('/\s+/', '_', $validated['name']);
                $extension = $request->member_photo->extension();
                $request->member_photo->storeAs('/public', $validated['name']."-member_photo-".$current_timestamp.".".$extension);
                $url = Storage::url($validated['name']."-member_photo-".$current_timestamp.".".$extension);
                $member_photo_url=$base_url.$url;
            }
        }

        if(isset($request["count"]))
        {
            $count=(int)$request["count"];
            $count++;
        }
        else
        {
            $count=1;
        }
        if($request["command"]=="submit")
        {
            $id=team_members::create
            (
                [
                    "project_id"=>$request['project_id'],
                    'name' => $request['name'],
                    'photo_url' => $member_photo_url,
                    'designation' => $request['designation'],
                    'description' => $request['description'],
                ]
            )->id;

            return redirect()->route('add_team_members_view', ['project_id'=>$request['project_id'],"count"=>$count]);


        }
        else if ($request["command"]=="skip")
        {
            return redirect()->route('home_page');

        }

    }
}
