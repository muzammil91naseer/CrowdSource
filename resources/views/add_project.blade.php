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

                                <textarea class="form-control" id="description" rows="5" name="description"></textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="features" class="col-md-4 col-form-label text-md-right">{{ __('Features (List elements seperated by ";")') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="features" rows="5" name="features"></textarea>
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
                            <label for="idea" class="col-md-4 col-form-label text-md-right">{{ __('Idea Description') }}</label>

                            <div class="col-md-6">

                                <textarea class="form-control" id="idea" rows="5" name="idea"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Team Description') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="team" rows="5" name="team"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="campaign_end_date" class="col-md-4 col-form-label text-md-right">{{ __('Campaign End Date') }}</label>

                            <div class="col-md-6">
                                <input id="campaign_end_date" type="text" class="form-control" name="campaign_end_date" placeholder="DD-MM-YYYY">
                            </div>
                        </div>

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
