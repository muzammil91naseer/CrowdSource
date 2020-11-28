@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-md-12 offset-md-0 text-md-center">{{ __('User Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insert_user_details') }}">
                        @csrf
                         
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            
                        

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line_1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1') }}</label>

                            <div class="col-md-6">
                                <input id="address_line_1" type="text" class="form-control" name="address_line_1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line_2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>

                            <div class="col-md-6">
                                <input id="address_line_2" type="text" class="form-control" name="address_line_2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control" name="postal_code">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" name="dob" placeholder="DD-MM-YYYY">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <input type="radio" id="male_radio" name="gender" value="Male">
                                <label class="col-md-4 col-form-label " for="Male">Male</label>
                        
                                <input type="radio" id="female_radio" name="gender" value="Female" >
                                <label class="col-md-4 col-form-label " for="Female">Female</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="registration_purpose" class="col-md-4 col-form-label text-md-right">{{ __('Registration Purpose') }}</label>
                            <div class="col-md-6">
                                <input type="radio" id="raise_radio" name="registration_purpose" value="Raise Funds">
                                <label class="col-md-4 col-form-label " for="Raise">Raise Funds</label>
                        
                                <input type="radio" id="invest_radio" name="registration_purpose" value="Invest" >
                                <label class="col-md-4 col-form-label " for="Invest">Invest</label>
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
