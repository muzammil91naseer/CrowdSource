@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card-header">
        <h2 style="font-size: 1.375rem;">{{ __('Project Details') }}</h2>
    </div>

    <div class="card-body">
        <div style="min-width=1500px; min-height: 375px; background-image: url('{{$project_data["cover_photo_large_url"]}}');background-repeat: no-repeat;background-size: cover; position:relative; padding:0.625rem; background-position: center; opacity:1;">
            <div class="row" style="margin: 0 auto; max-width: 75rem; width=100%; padding: 0; box-sizing: inherit; display: block;">
                <div style="min-height: 375px;padding-bottom: 1rem;padding-top: 1rem;position: relative;box-sizing: inherit;    padding-left: .9375rem; padding-right: .9375rem; float: left;">
                    <div style="margin: 0; padding: 0; box-sizing: inherit;">
                        
                        <div style="margin-bottom: 2rem; box-sizing: inherit;">
                        </div>
                        
                        <div style="margin: 0; padding: 0; box-sizing: inherit;">
                            <div style="background: #fff;
                                        border: 1px solid #e6e6e6;
                                        height: 5pc;
                                        margin: 0 auto 1rem;
                                        width: 5pc;
                                        box-sizing: inherit;
                                        position: absolute;">
                                <div style="height: 5pc;
                                            position: absolute;
                                            width: 5pc;
                                            box-sizing: inherit;">
                                    <div style="height: 200px;
                                                margin: -1px;
                                                overflow: hidden;
                                                position: absolute;
                                                width: 200px;">
                                        <span style="background: #ff5100;
                                                    color: #fff;
                                                    font-size: .65em;
                                                    font-weight: 700;
                                                    left: -67.5px;
                                                    position: absolute;
                                                    text-align: center;
                                                    text-transform: uppercase;
                                                    top: 24px;
                                                    -webkit-transform: rotate(-45deg);
                                                    transform: rotate(-45deg);
                                                    width: 100%;">
                                        </span>
                                    </div>
                                </div>
                                <img style="width: 5pc; height:5pc, float:left; border: 1px solid rgb(228, 228, 228); box-sizing: inherit;" src='{{$project_data["profile_photo_url"] }}'>
                                

                            </div>
                        </div>

                    </div>
                </div>
            
            </div>
        </div>
        
        
        {{$project_data}}
        
    </div>      
                
</div>
@endsection
