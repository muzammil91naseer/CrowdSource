<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\one_time_registration_links;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::get('/', function () 
{
    return view('home');
});

Route::get('/register_admin', function () 
{
    return view('auth/register_admin');
});

Route::get('/register_judge', function () 
{
    return view('auth/register_judge');
});

Route::get('admin/one_time_register_link', function () 
{
    return view('auth/one_time_register_link');
});

Route::post('admin/generate_link', function (Request $request)
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

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

