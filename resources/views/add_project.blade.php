@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-md-12 offset-md-0 text-md-center">{{ __('Add New Project') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add_project') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="textarea" class="form-control" name="description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="features" class="col-md-4 col-form-label text-md-right">{{ __('Features (; seperated list)') }}</label>

                            <div class="col-md-6">
                                <input id="features" type="textarea" class="form-control" name="features">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="raised_amount" class="col-md-4 col-form-label text-md-right">{{ __('Raised Amount') }}</label>

                            <div class="col-md-6">
                                <input id="raised_amount" type="text" class="form-control" name="raised_amount">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="target_amount" class="col-md-4 col-form-label text-md-right">{{ __('Target Amount') }}</label>

                            <div class="col-md-6">
                                <input id="target_amount" type="text" class="form-control" name="target_amount">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="equity_percentage" class="col-md-4 col-form-label text-md-right">{{ __('Equity Percentage') }}</label>

                            <div class="col-md-6">
                                <input id="equity_percentage" type="text" class="form-control" name="equity_percentage">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pre_monthly_valuation" class="col-md-4 col-form-label text-md-right">{{ __('Pre Monthly Valuation') }}</label>

                            <div class="col-md-6">
                                <input id="pre_monthly_valuation" type="text" class="form-control" name="pre_monthly_valuation">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="share_price" class="col-md-4 col-form-label text-md-right">{{ __('Share Price') }}</label>

                            <div class="col-md-6">
                                <input id="share_price" type="text" class="form-control" name="share_price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_investors" class="col-md-4 col-form-label text-md-right">{{ __('Total Investors') }}</label>

                            <div class="col-md-6">
                                <input id="total_investors" type="text" class="form-control" name="total_investors">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="idea" class="col-md-4 col-form-label text-md-right">{{ __('Idea') }}</label>

                            <div class="col-md-6">
                                <input id="idea" type="textarea" class="form-control" name="idea">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Team') }}</label>

                            <div class="col-md-6">
                                <input id="team" type="textarea" class="form-control" name="team">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="campaign_end_date" class="col-md-4 col-form-label text-md-right">{{ __('Campaign End Date') }}</label>

                            <div class="col-md-6">
                                <input id="campaign_end_date" type="text" class="form-control" name="campaign_end_date" placeholder="DD-MM-YYYY">
                            </div>
                        </div>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
