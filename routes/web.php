<?php

//you can define what kind of urls or routes will be available on your application

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
//root route, returns welcome.
//lai norādītu uz direktoriju, kas nosaukta start, būs start.welcome
//kādus ceļus atļaut publiski un kādus neatļaut

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tweets', TweetController::class);
