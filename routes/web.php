<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
   Route::view('/', 'home');

   Route::view('/test', 'test');

    Route::resource('jobs', 'JobController');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


/*
    Route Structure:

    Resource: job

    GET     /jobs           =>  Index jobs (diff between admin or std user)
    GET     /jobs/create    =>  Show create job form
    POST    /jobs           =>  Create the posted job under the posting user.
    GET     /jobs/{id}      =>  Show Job of the given ID
    GET     /jobs/{id}/edit =>  Show editing form for the given Job [optional: make fields in "Show Job" editable, ditching this route]
    PATCH   /jobs/{id}      =>  Update the given job, adding changes to the history
    DELETE  /jobs/{id}      =>  Delete the given job [optional: marking it as deleted, for archiving purposes?]

    Resource: job.comment

*/