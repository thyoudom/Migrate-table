<?php

use App\Events\BookingEvent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    // return view("admin::pusher");
    return view("admin::welcome");
});

Route::get('/pusher', function () {
    return view("admin::pusher");
});
