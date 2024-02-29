<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/royalty', function () {
//     return Royalty::all();
// });

// Route::get('/send', function () {

//     $sending = Mail::to('montontami112@gmail.com')
//         ->send(new MyEmail('bitin'));

//     return $sending ? "success" : "error";
// });
