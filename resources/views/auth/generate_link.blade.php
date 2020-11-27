@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <label class="col-form-label " for="url">Registration Link:  </label> {{$url}}
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
