@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" style="min-width:100% !important;">
        <div class="col" style="padding : 0px !important; margin:0px !important; min-width:100% !important;">>
            <div class="row "; style="left:0px; min-width: 100%; min-height: 375px; background-image: url('{{$project_data["cover_photo_large_url"]}}');background-repeat: no-repeat;background-size: cover; position:relative;  background-position: center; opacity:1;">
                <div class="col">

                        <img style=" left:16% !important; top: 251px !important; width: 148px;border: 1px solid rgb(228, 228, 228);box-sizing: inherit;  position: relative; " src='{{$project_data["profile_photo_url"] }}'>
                        <span style="left:16%; top: 210px; position: relative; font-family: akkurat,Helvetica Neue,Helvetica,Arial,sans-serif;margin: 0;font-size: 2rem;font-weight: 700; color: #fff;"> {{$project_data["name"]}} </span>

                </div>
            </div>

            <div class="row  "; style="width:70% ; height:100%; position: relative; margin-left:15%; margin-right:15%;">
                <div class="col">
                    <div class="row no-gutters" style="min-width:100% ; position: relative; ">
                        <div class ="col-md-2">
                        </div>
                        <div class=" col-md-10 progress progress active" style="background-color:#00008B !important;-webkit-box-shadow: none !important; box-shadow: none;!important; border-radius: 10px;" >
                            <div class="progress-bar row no-gutters" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="background:#ff5100; border-radius: 10px; width: {{bcdiv(($project_data["raised_amount"]/$project_data["target_amount"])*100,1,0) }}%;">
                                {{bcdiv(($project_data["raised_amount"]/$project_data["target_amount"])*100,1,0) }}% Target Achieved
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters" style="  min-width:100% ; position: relative;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-10">
                            <div class="row no-gutters">
                                @if (isset($project_data["raised_amount"]))
                                <div class="col-md-2">
                                    <div class="row justify-content-center">
                                        <span style="font-size: 24px; font-weight: 700;"> ${{number_format($project_data["raised_amount"],0)}} </span>
                                    </div>
                                    <div class="row justify-content-center">
                                        <span style="font-size: 14px; font-weight: 400; ">Raised</span>
                                    </div>
                                </div>
                                @endif
                                @if (isset($project_data["total_investors"]))
                                <div class="col-md-2" style="border-right: 1px solid #666;">
                                    <div class="row justify-content-center">
                                        <span style="font-size: 24px; font-weight: 700;"> {{number_format($project_data["total_investors"],0)}} </span>
                                    </div>
                                    <div class="row justify-content-center">
                                        <span style="font-size: 14px; font-weight: 400; ">Investors</span>
                                    </div>
                                </div>
                                @endif
                                @if (isset($project_data["target_amount"]))
                                <div class="col-md-2" style="margin-top:1em !important;">
                                    <div class="row justify-content-center">
                                        <span style="font-size: 1pc; font-weight: 700;"> ${{number_format($project_data["target_amount"],0)}} </span>
                                    </div>
                                    <div class="row justify-content-center">
                                        <span style="font-size: 14px; font-weight: 400; ">Target</span>
                                    </div>
                                </div>
                                @endif
                                @if (isset($project_data["equity_percentage"]))
                                <div class="col-md-2" style="margin-top:1em !important;">
                                    <div class="row justify-content-center">
                                        <span style="font-size: 1pc; font-weight: 700;"> {{number_format($project_data["equity_percentage"],0)}}% </span>
                                    </div>
                                    <div class="row justify-content-center">
                                        <span style="font-size: 14px; font-weight: 400; ">Equity</span>
                                    </div>
                                </div>
                                @endif
                                @if (isset($project_data["pre_monthly_valuation"]))
                                <div class="col-md-2" style="margin-top:1em !important;">
                                    <div class="row justify-content-center">
                                        <span style="font-size: 1pc; font-weight: 700;"> ${{number_format($project_data["pre_monthly_valuation"],0)}} </span>
                                    </div>
                                    <div class="row justify-content-center">
                                        <span style="font-size: 14px; font-weight: 400; ">Pre Monthly Valuation</span>
                                    </div>
                                </div>
                                @endif
                                @if (isset($project_data["share_price"]))
                                <div class="col-md-2" style="margin-top:1em !important;">
                                    <div class="row justify-content-center">
                                        <span style="font-size: 1pc; font-weight: 700;"> ${{number_format($project_data["share_price"],0)}} </span>
                                    </div>
                                    <div class="row justify-content-center"  >
                                        <span style="font-size: 14px; font-weight: 400; text-align: center !important; ">Share Price</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>{{-- End Info row--}}

                    <div  class="row no-gutters" style="width:100% ; position: relative; left:0% !important">
                        <div class="col-md-7">
                            <div class="row no-gutters">
                                <p style= "font-size: 0.7rem; font-weight: 400; line-height: 1.5; margin-bottom: 1.25rem; margin-top: 20px;">
                                    {{$project_data["description"]}}
                                </p>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-1" >
                                    <a href="{{$project_data['website']}}">
                                            <img style="height: 1.5em !important; width: 1.5em;" src="http://localhost/startup_competition/storage/app/public/icons/globe-icon.png">
                                    </a>
                                </div>
                                <div class="col-md-1" >
                                    <a href="{{$project_data['facebook']}}">
                                        <img style="height: 1.5em !important; width: 1.5em;" src="http://localhost/startup_competition/storage/app/public/icons/facebook-icon.png">
                                    </a>
                                </div>
                                <div class="col-md-1" >
                                    <a href="{{$project_data['twitter']}}">
                                        <img style="height: 1.5em !important; width: 1.5em;" src="http://localhost/startup_competition/storage/app/public/icons/twitter-icon.png">
                                    </a>
                                </div>
                                <div class="col-md-1" >
                                    <a href="{{$project_data['instagram']}}">
                                        <img style="height: 1.5em !important; width: 1.5em;" src="http://localhost/startup_competition/storage/app/public/icons/instagram-icon.png">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-5">
                               @php
                                    $features=preg_split("~;~",$project_data["features"]);
                                @endphp
                                <ul style="margin-top: 13px;display: block;list-style-type: disc;margin-block-start: 1em;margin-block-end: 1em; margin-inline-start: 0px;margin-inline-end: 0px; padding-inline-start: 40px;">
                                @foreach ($features as $key => $value)
                                    <li style="color: #ff5100;">
                                        <p style="color: black; font-size: 0.7rem; font-weight: 700;  padding-left: 0.51499rem; padding-right: 0.51499rem; line-height: 1.5; margin-bottom: 0px; margin-top: 0px;">
                                            {{(string)$value}}
                                        </p>

                                    </li>
                                @endforeach
                                </ul>
                        </div>

                    </div>
                </div>{{-- End Column width:80% --}}


            </div>{{-- End Row width:80% --}}
        </div> {{-- End Main Column --}}
    </div>{{-- End Main Row --}}

</div> {{-- End Container --}}
@endsection
