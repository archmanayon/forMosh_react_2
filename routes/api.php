<?php

use App\Http\Controllers\RoyaltyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Royalty;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('royalty', RoyaltyController::class)->except(['update', 'destroy']);

    Route::post('logout', [UserController::class, 'destroyToken']);

    // filter according to chosen field
    Route::get('fields', [RoyaltyController::class, 'chooseFilter']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'create']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user()->all();
// });

// Route::get('isbn/{id:isbn}', [
//     function (Royalty $id) {
//         return $id;
//     }
// ]);


Route::get('mosh', function(){
    return response()->json(Royalty::all(), 200);
});

Route::post('mosh', function (Request $request)

{   
    $fields = $request->validate([
        'id' => 'required|numeric',
        'publisher_number' => 'required|string',
        'title' => 'required|string',
        'author' => 'required|string'
    ]);

    $user = Royalty::create($fields);        

    return logger($user. 'or'. $request);
    // response([
    //     "testing" => $request,
    //     "imported" => $imported??false,
    //     "duplicates" => $duplicates??false,
    // ], 201);
});
