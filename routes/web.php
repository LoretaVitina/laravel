<?php

//you can define what kind of urls or routes will be available on your application

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
//root route, returns welcome.
//lai norādītu uz direktoriju, kas nosaukta start, būs start.welcome
//kādus ceļus atļaut publiski un kādus neatļaut

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

//Route::group([
//    'as' => 'passport.',
//    'prefix' => config('passport.path', 'oauth'),
//    'namespace' => '\Laravel\Passport\Http\Controllers',
//], function () {
//    // Passport routes...
//});


