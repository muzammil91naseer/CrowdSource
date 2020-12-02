@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card-body" style="padding : 0px !important; min-width:100% !important;">
        <div style="left:0px; min-width: 100%; min-height: 375px; background-image: url('{{$project_data["cover_photo_large_url"]}}');background-repeat: no-repeat;background-size: cover; position:absolute;  background-position: center; opacity:1;">
            <div class="row no-gutters" style="margin: 0 auto; max-width: 75rem; width=100%; padding: 0; box-sizing: inherit; display: block;">
                                
                <img style="left:17%; top: 251px;width: 148px;border: 1px solid rgb(228, 228, 228);box-sizing: inherit;  position: absolute;" src='{{$project_data["profile_photo_url"] }}'>
                <span style="left:29%; top: 251px; position: absolute; font-family: akkurat,Helvetica Neue,Helvetica,Arial,sans-serif;margin: 0;font-size: 2rem;font-weight: 700; color: #fff;"> {{$project_data["name"]}} </span>
            </div>
            
        </div>
        <div class="row" style="width:90% ; height:100%; position: relative; top:375px !important; margin-left:5%; margin-right:5%;">
            <div class="row no-gutters" style="width:100% ; min-height:20px; position: relative;">
                <div class="col" style="max-width:21% ; min-height:20px; position: relative;">
                </div>
                <div class="col" style="min-width:79% ; min-height:20px; position: relative;">
                    <div class="progress progress-bar-striped active" >
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="background:#ff5100; border-radius: 10px; width: {{bcdiv(($project_data["raised_amount"]/$project_data["target_amount"])*100,1,0) }}%;">
                            {{bcdiv(($project_data["raised_amount"]/$project_data["target_amount"])*100,1,0) }}% Target Achieved
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="text-align: right">
            <div class="row no-gutters" style="width:100% ; min-height:80px; position: relative;">
               
                <div class="row no-gutters" style="  min-width:100% ; height:20px; position: relative;  text-align: right;">
                    @if (isset($project_data["raised_amount"]))
                    <div class="col-md-2"> 
                        <div class="row no-gutters">
                            <span style="font-size: 24px; font-weight: 700;"> ${{number_format($project_data["raised_amount"],0)}} </span>
                        </div>
                        <div class="row no-gutters">
                            <span style="font-size: 14px; font-weight: 400; ">Raised</span>
                        </div>
                    </div>
                    @endif
                    @if (isset($project_data["total_investors"]))
                    <div class="col-md-2">
                        <div class="row no-gutters">
                            <span style="font-size: 24px; font-weight: 700;"> {{number_format($project_data["total_investors"],0)}} </span>
                        </div>
                        <div class="row no-gutters">
                            <span style="font-size: 14px; font-weight: 400; ">Investors</span>
                        </div>
                    </div>
                    @endif
                    @if (isset($project_data["target_amount"]))
                    <div class="col-md-2">
                        <div class="row no-gutters">
                            <span style="font-size: 24px; font-weight: 700;"> ${{number_format($project_data["target_amount"],0)}} </span>
                        </div>
                        <div class="row no-gutters">
                            <span style="font-size: 14px; font-weight: 400; ">Target</span>
                        </div>
                    </div>
                    @endif 
                    @if (isset($project_data["equity_percentage"]))
                    <div class="col-md-2">
                        <div class="row no-gutters">
                            <span style="font-size: 24px; font-weight: 700;"> {{number_format($project_data["equity_percentage"],0)}}% </span>
                        </div>
                        <div class="row no-gutters">
                            <span style="font-size: 14px; font-weight: 400; ">Equity</span>
                        </div>
                    </div>
                    @endif 
                    @if (isset($project_data["pre_monthly_valuation"]))
                    <div class="col-md-2">
                        <div class="row no-gutters">
                            <span style="font-size: 24px; font-weight: 700;"> ${{number_format($project_data["pre_monthly_valuation"],0)}} </span>
                        </div>
                        <div class="row no-gutters">
                            <span style="font-size: 14px; font-weight: 400; ">Pre Monthly Valuation</span>
                        </div>
                    </div>
                    @endif
                    @if (isset($project_data["share_price"]))
                    <div class="col-md-2">
                        <div class="row no-gutters">
                            <span style="font-size: 24px; font-weight: 700;"> ${{number_format($project_data["share_price"],0)}} </span>
                        </div>
                        <div class="row no-gutters">
                            <span style="font-size: 14px; font-weight: 400; ">Share Price</span>
                        </div>
                    </div>
                    @endif
               </div>
            </div>
            </div>
        </div>
    </div>                 
</div>
@endsection
