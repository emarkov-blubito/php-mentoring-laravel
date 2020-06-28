<?php

use Illuminate\Http\Request;
use App\Account;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::put('/api_basic/entity-accounts', function (Request $request) {
    Account::seedData($request->all());
    return response()->json(['ok' => 1], 200);
})->middleware('basicauth');

Route::middleware('auth:api')->get('/test-bearer-token', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/test-oauth2', function (Request $request) {
    dd('x');
    $user_id = $request->get("uid", 0);
    $user = User::find($user_id);
    return $user;
});
