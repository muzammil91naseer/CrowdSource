@extends('layouts.app')

@section('content')
<div class="container" style="min-width:100% !important;">
    
    <div class="card-body" style="padding : 0px !important; min-width:100% !important;">
        <div style=" left: 0px; min-width: 100%; min-height: 375px; background-image: url('{{$project_data["cover_photo_large_url"]}}');background-repeat: no-repeat;background-size: cover; position:absolute;  background-position: center; opacity:1;">
            <div class="row" style="margin: 0 auto; max-width: 75rem; width=100%; padding: 0; box-sizing: inherit; display: block;">
                                
                <img style="top: 251px;width: 148px;border: 1px solid rgb(228, 228, 228);box-sizing: inherit;  position: absolute;" src='{{$project_data["profile_photo_url"] }}'>
                  
            </div>
            
        </div>
        <div class="row" style=" left: 0px; min-width=100% ; min-height:100px; position: relative; top:375px !important; ">
            <div class="row" style=" left: 0px; min-width:100% ; min-height:20px; position: relative;">
                <div class="col" style="  min-width:18% ; min-height:20px; position: relative;">
                </div>
                <div class="col" style=" min-width:82% ; min-height:20px; position: relative; padding-right: 0px !important; padding-left: 0px !important; ">
                    <div class="progress progress-bar-striped active" >
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="background:#ff5100; border-radius: 10px; width: {{bcdiv(($project_data["raised_amount"]/$project_data["target_amount"])*100,1,0) }}%;">
                            {{bcdiv(($project_data["raised_amount"]/$project_data["target_amount"])*100,1,0) }}% Target Achieved
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style=" left: 0px; min-width:50% ; min-height:80px; position: relative; ">
            
            </div>
            <div class="col" style=" right: 0px; min-width:50% ; min-height:80px; position: relative; text-align: right; ">
               
                <span style="font-size: 24px; font-weight: 700; margin-left: 5px;"> ${{number_format($project_data["raised_amount"],0)}} </span>
                <span style="font-size: 14px; font-weight: 400; ">Raised</span>

                <span style="font-size: 24px; font-weight: 700; margin-left: 5px;"> {{number_format($project_data["total_investors"],0)}} </span>
                <span style="font-size: 14px; font-weight: 400; ">Investors</span>

                <span style="font-size: 24px; font-weight: 700; margin-left: 5px;"> ${{number_format($project_data["target_amount"],0)}} </span>
                <span style="font-size: 14px; font-weight: 400; ">Target</span>
            </div>
        </div>
    </div>                 
</div>
@endsection
