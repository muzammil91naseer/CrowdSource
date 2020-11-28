@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (isset($message))
                    @if ($message!="")
                        <div class="alert alert-danger">    
                            <span >{{$message}}</span>
                        </div>       
                    @endif
                @endif
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Home Page') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
