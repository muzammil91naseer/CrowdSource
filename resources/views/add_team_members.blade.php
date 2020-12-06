@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-md-12 offset-md-0 text-md-center">{{ __('Add Team Member # '.$request['count']) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add_team_members') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                <input id="designation" type="textarea" class="form-control" name="designation">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="member_photo" class="col-md-4 col-form-label text-md-right">Choose Team Member Photo: </label>
                            <div class="col-md-6">
                                <input id="member_photo" type="file" name="member_photo">
                            </div>
                        </div>
                        {{ Form::hidden('project_id', $request["project_id"]) }}

                        <div class="form-group row mb-0">
                            <div class="col" style="left:33% !important;">
                                <button type="submit" class="btn btn-primary" name="command" value="submit">
                                    {{ __('Add Member') }}
                                </button>
                            </div>

                            <div class="col" style="left:2% !important;">
                                <button type="submit" class="btn btn-primary" name="command" value="skip">
                                    {{ __('Skip to next') }}
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
