@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row no-gutters">
        <div class="col-md">
            @if (isset($message))
                @if ($message!="")
                    <div class="alert alert-danger">
                        <span >{{$message}}</span>
                    </div>
                @endif
            @endif
            <div class="row no-gutters" style=" border-bottom: 2px solid #e4e4e4 !important; margin-bottom:3% !important; margin-top:1% !important;">
                <h1 style="font-size: 1.375rem; font-weight: bold;">{{ __('Investment opportunities') }}</h1>
            </div>
            @foreach(array_chunk($projects_all_array["data"], 3) as $chunk)
                <div class="row justify-content-center">
                    @foreach($chunk as $project)
                        <div class="col-sm hvr-grow-shadow px-0" style="border: 1px solid #e4e4e4; border-radius: 15px 15px 15px 15px;  margin:1% !important">
                            <a href={{ route('project_details', ['project_id'=>$project['id']]) }} style="text-decoration: none; color: #212529;">
                            <div class="row no-gutters" style=" border-radius: 15px 15px 0px 0px; min-height: 168px; background-image: url('{{$project["cover_photo_url"]}}');width: 100%;background-repeat: no-repeat;background-size: cover; position:relative; background-position: center; opacity:1;">
                            </div>
                            <div class="row no-gutters" style="margin-bottom: 0.6rem; padding:0.3125rem 0.625rem; position:relative;">
                                <img src={{$project["profile_photo_url"]}} style="animation: fade-up-image .4s ease; background-color: #fff; border: 1px solid #e4e4e4; font-size: 9pt; height: 75pt; margin: -78px .3125rem 0 0; opacity: 1; position: relative; width: 75pt;" >
                            </div>
                            <div class="row no-gutters" style="flex: 1 0 0px; padding: 0 .625rem; height:35%;">
                                <h1 style="color:#030352; font-size:1.375em; font-weight:700; margin-bottom:0.2rem;">{{ $project["name"] }}</h1>
                                <p style="color:#747474; font-size:0.875em; ">{{ \Illuminate\Support\Str::limit($project["description"], 300, $end='...') }}</p>
                            </div>
                            <div class="row no-gutters" style="font-weight: 700; font-size:0.9rem; flex: 1 0 0px; padding: 0 .625rem;">
                                <p>${{number_format($project["target_amount"],0)}} Target </p>
                            </div>
                            <div class="row no-gutters" style="font-weight: 700; font-size:0.9rem; flex: 1 0 0px; padding: 0 .625rem;">
                                <div class=" col progress progress active" style="background-color:#00008B !important;-webkit-box-shadow: none !important; box-shadow: none;!important; border-radius: 10px;" >
                                    <div class="progress-bar row no-gutters" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="background:#ff5100; border-radius: 10px; width: {{bcdiv(($project["raised_amount"]/$project["target_amount"])*100,1,0) }}%;">
                                        {{bcdiv(($project["raised_amount"]/$project["target_amount"])*100,1,0) }}% Target Achieved
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="font-size: 1em; font-weight: 700; flex: 1 0 0px; padding: 0 .625rem;">
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
                            <div class="row no-gutters" style="font-size: 0.825em;font-weight: 400; flex: 1 0 0px; padding: 0 .625rem; ">
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
                        </a>
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
@endsection
