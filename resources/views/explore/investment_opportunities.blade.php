@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin:0; padding:0;">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    @if (isset($message))
                        @if ($message!="")
                            <div class="alert alert-danger">    
                                <span >{{$message}}</span>
                            </div>       
                        @endif
                    @endif
                    <div class="card-header">
                        <h2 style="font-size: 1.375rem;">{{ __('Investment opportunities') }}</h2>
                    </div>

                    <div class="card-body">
                        @foreach(array_chunk($projects_all_array["data"], 3) as $chunk)
                            <div class="row">
                                @foreach($chunk as $project)
                                    <div class="col">
                                        <div class="row" style="border-radius: 15px 15px 0px 0px; min-height: 168px; background-image: url('{{$project["cover_photo_url"]}}');width: 100%;background-repeat: no-repeat;background-size: cover; position:relative; padding:0.625 rem;background-position: center; opacity:1;">
                                        </div>
                                        <div class="row" style="margin-bottom: 0.6rem; padding:0.3125rem 0.625rem; position:relative;">
                                            <img src={{$project["profile_photo_url"]}} style="animation: fade-up-image .4s ease; background-color: #fff; border: 1px solid #e4e4e4; float: left; font-size: 9pt; height: 75pt; margin: -78px .3125rem 0 0; opacity: 1; position: relative; width: 75pt;" >
                                        </div>
                                        <div class="row" style="flex: 1 0 0px; padding: 0 .625rem;">
                                            <h1 style="color:#030352; font-size:1.375em; font-weight:700; margin-bottom:0.2rem;">{{ $project["name"] }}</h1>
                                            <p style="color:#747474; font-size:0.875em;  margin-right:15px;">{{ \Illuminate\Support\Str::limit($project["description"], 300, $end='...') }}</p>
                                        </div>
                                        <div class="row" style="margin: 0; ">
                                            <div style="font-weight: 700; margin-left=10px !important; font-size:0.9rem; ">
                                                <p>${{number_format($project["target_amount"],0)}} Target </p>
                                                <span style="font-size:0.9rem; font-weight: 700;" >{{bcdiv($percentage_target_achieved= ($project["raised_amount"]/$project["target_amount"])*100,1,0) }} % Achieved </span>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left=10px !important; font-size: 1em; font-weight: 700; ">
                                            <div class="col">
                                                <p style="margin-bottom: 0.5rem !important;">${{number_format($project["raised_amount"],0)}}</p>
                                            </div>
                                            <div class="col">
                                                <p style="margin-bottom: 0.5rem !important;">{{number_format($project["equity_percentage"],0)}}%</p>
                                            </div>
                                            <div class="col">
                                                <p style="margin-bottom: 0.5rem !important;">{{number_format($project["total_investors"],0)}}</p>
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 0.825em;font-weight: 400;margin-left=10px !important; ">
                                            <div class="col">
                                                <p>Raised</p>
                                            </div>
                                            <div class="col">
                                                <p>Equity</p>
                                            </div>
                                            <div class="col">
                                                <p>Investors</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </div>
                        @endforeach
                        <div class="row justify-content-center" style="margin-top: 10px;">
                            {{ $projects_all->links() }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
