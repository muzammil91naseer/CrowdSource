@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-md-12 offset-md-0 text-md-center">{{ __('Add Project Media') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add_project_media') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idea_video_url" class="col-md-4 col-form-label text-md-right">Idea Video URL</label>
                            <div class="col-md-6">
                                <input id="idea_video_url" type="text" name="idea_video_url">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cover_photo" class="col-md-4 col-form-label text-md-right">Choose Small Cover Photo</label>
                            <div class="col-md-6">
                                <input id="cover_photo" type="file" name="cover_photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cover_photo_medium" class="col-md-4 col-form-label text-md-right">Choose Medium Cover Photo</label>
                            <div class="col-md-6">
                                <input id="cover_photo_medium" type="file" name="cover_photo_medium">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cover_photo_large" class="col-md-4 col-form-label text-md-right">Choose Large Cover Photo</label>
                            <div class="col-md-6">
                                <input id="cover_photo_large" type="file" name="cover_photo_large">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profile_photo" class="col-md-4 col-form-label text-md-right">Choose Profile Photo</label>
                            <div class="col-md-6">
                                <input id="profile_photo" type="file" name="profile_photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team_photo" class="col-md-4 col-form-label text-md-right">Choose Team Photo</label>
                            <div class="col-md-6">
                                <input id="team_photo" type="file" name="team_photo">
                            </div>
                        </div>

                        {{ Form::hidden('name', $request["name"]) }}
                        {{ Form::hidden('project_id', $request["project_id"]) }}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
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
