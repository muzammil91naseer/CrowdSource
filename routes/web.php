<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\one_time_registration_links;
use App\Models\projects;
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

Route::get('/', function (Request $message) 
{
    if(!isset($message["message"]))
    {
        $message["message"]="";
    }
    $projects_all = projects::paginate(12);
    $projects_all_array=$projects_all->toArray();
    return view('home',["message"=>$message["message"],"projects_all"=>$projects_all,"projects_all_array"=>$projects_all_array]);
})->name('home_page');

Route::get('/register_admin', function (Request $request) 
{
    return view('auth/register_admin',["request" => $request]);
})->name('register_admin');

Route::get('/register_judge', function (Request $request) 
{
    return view('auth/register_judge',["request" => $request]);
})->name('register_judge');

Route::get('/admin/one_time_register_link', function () 
{
    return view('auth/one_time_register_link');
})->name('one_time_register_link');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/explore/investment_opportunities', [App\Http\Controllers\NavbarController::class,'investment_opportunities'])->name('investment_opportunities');

Route::get('/explore/investing', [App\Http\Controllers\NavbarController::class,'investing'])->name('investing');

Route::get('/explore/raising', [App\Http\Controllers\NavbarController::class,'raising'])->name('raising');

Route::get('/explore/about_us', [App\Http\Controllers\NavbarController::class,'about_us'])->name('about_us');

Route::post('/admin/generate_link', [App\Http\Controllers\Auth\RegisterController::class, 'generate_link'])->name('generate_link');

Route::get('/user_details_view', [App\Http\Controllers\UserDetailsController::class,'get_user_details_view'])->name('get_user_details_view')->middleware('auth');

Route::post('/insert_user_details', [App\Http\Controllers\UserDetailsController::class,'insert_user_details'])->name('insert_user_details')->middleware('auth');

Route::get('/add_project_view', [App\Http\Controllers\ProjectsController::class,'add_project_view'])->name('add_project_view')->middleware('auth');

Route::post('/add_project', [App\Http\Controllers\ProjectsController::class,'add_project'])->name('add_project')->middleware('auth');

Route::get('/project_details', [App\Http\Controllers\ProjectsController::class,'project_details_view'])->name('project_details');
