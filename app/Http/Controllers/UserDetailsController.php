<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;
use App\Models\user_details;

class UserDetailsController extends Controller
{
    public function get_user_details_view()
    {
        $countries=CountryListFacade::getList("en");
        return view("user_details",compact("countries"));
    }

    public function insert_user_details(Request $request)
    {
        $user_id=auth()->user()->id;
        $name=auth()->user()->name;
        $email=auth()->user()->email;
        if($request['registration_purpose']=="Raise Funds")
        {
            $registered_to_raise_funds=true;
        }
        else
        {
            $registered_to_raise_funds=false;
        }
        $user_id=auth()->user()->id;
        $row = user_details::where('user_id', '=', $user_id)->first();
        if(isset($row))
        {
            user_details::where('user_id',$user_id)->update([
                'name' => $name,
                'email' => $email,
                'user_id' => $user_id,
                'country'=> $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
                'address_line_1' => $request['address_line_1'],
                'address_line_2' => $request['address_line_2'],
                'postal_code' => $request['postal_code'],
                'date_of_birth' => $request['dob'],
                'gender' => $request['gender'],
                'registered_to_raise_funds' => $registered_to_raise_funds,
            ]);
        }
        else
        {
            user_details::create([
                'name' => $name,
                'email' => $email,
                'user_id' => $user_id,
                'country'=> $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
                'address_line_1' => $request['address_line_1'],
                'address_line_2' => $request['address_line_2'],
                'postal_code' => $request['postal_code'],
                'date_of_birth' => $request['dob'],
                'gender' => $request['gender'],
                'registered_to_raise_funds' => $registered_to_raise_funds,
            ]);

        }
        return redirect()->route('home_page');

    }
}
