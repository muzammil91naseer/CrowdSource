<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\one_time_registration_links;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       
        if(array_key_exists("is_admin",$data))
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => $data['is_admin'],
            ]);

        }
        else if(array_key_exists("is_judge",$data))
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_judge' => $data['is_judge'],
            ]);

        }
        else
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

        }
        
    }

    public function generate_link(Request $request)
    {
        $data=$request;
        $uniqid = Str::random(12);
        $base_url = env("BASE_URL", "default");
        $url="";
        if(isset($data["admin_judge"]) )
        {
            if(isset($data["admin_judge"]))
            {
                if($data['admin_judge']=="judge")
                {
                    $url=$base_url.'register_judge'."?token=".$uniqid;
                    one_time_registration_links::create
                    (
                        [
                            'token' => $uniqid,
                            'is_expired' => '0',
                        ]
                    );
                    
                    return view('auth/generate_link',["url" => $url]);

                }else if($data['admin_judge']=="admin")
                {
                    $url=$base_url.'register_admin'."?token=".$uniqid;
                    info($url);
                    one_time_registration_links::create
                    (
                        [
                            'token' => $uniqid,
                            'is_expired' => '0',
                        ]
                    );
                    info("end");
                    
                    return view('auth/generate_link',["url" => $url]);
                }

            }
        
        }else
        {
            info("else");
            $url="Registration link could not be generated";
            return view('auth/generate_link',["url" => $url]);
        }

            

        

    }
}
