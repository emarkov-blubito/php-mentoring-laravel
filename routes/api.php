<?php

use Illuminate\Http\Request;
use App\Account;

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
    Account::seedData($request->json);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
