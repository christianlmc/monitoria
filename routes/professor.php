<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('professor')->user();

    //dd($users);

    return view('professor.home');
})->name('home');

