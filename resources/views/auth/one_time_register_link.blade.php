@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Generate One Time Registration Links') }}</div>

                <div class="card-body">
                    <form method="GET" action='/startup_competition/public/admin/generate_link'>
                        @csrf
                        
                        <div>
                            <input type="radio" id="judge_radio" name="admin_judge" value="judge" checked>
                            <label class="col-md-4 col-form-label " for="Judge">Judge</label>
                        </div>

                        <div>
                            <input type="radio" id="admin_radio" name="admin_judge" value="admin" >
                            <label class="col-md-4 col-form-label " for="Admin">Admin</label>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generate Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
