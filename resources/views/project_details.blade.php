@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body" style="padding : 0px !important;">
        <div style="    left: 0px; min-width: 100%; min-height: 375px; background-image: url('{{$project_data["cover_photo_large_url"]}}');background-repeat: no-repeat;background-size: cover; position:absolute;  background-position: center; opacity:1;">
            <div class="row" style="margin: 0 auto; max-width: 75rem; width=100%; padding: 0; box-sizing: inherit; display: block;">
                                
                <img style="top: 251px;width: 148px;border: 1px solid rgb(228, 228, 228);box-sizing: inherit;  position: absolute;" src='{{$project_data["profile_photo_url"] }}'>
                  
            </div>
        </div>
    </div>                 
</div>
@endsection
