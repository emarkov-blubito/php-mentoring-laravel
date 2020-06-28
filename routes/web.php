<?php

use Illuminate\Http\Request;

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

// Route::get('/', 'PagesController@homepage');
// Route::get('/load-products/{offset}', 'PagesController@loadProducts');


Auth::routes();

Route::get('/', 'PagesController@homepage');
Route::get('/load-products/{offset}', 'PagesController@loadProducts');
Route::get('/products/filter', 'ProductController@filter');
Route::get('/brands/{url}', 'BrandController@getProductsByUrl');
Route::resource('categories', 'CategoryController');
Route::get('/categories/{url}', 'CategoryController@getProductsByUrl');
Route::resource('brands', 'BrandController');
Route::resource('products', 'ProductController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $redirect_uri = config('app.url') . '/auth/callback';

    $query = http_build_query([
        'client_id' => '3',
        'redirect_uri' => $redirect_uri,
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect( config('app.url') . '/oauth/authorize?'.$query);
});

Route::get('/auth/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $http = new GuzzleHttp\Client;

    $redirect_uri = config('app.url') . '/auth/callback';

    $response = $http->post(config('app.url') . '/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '3',
            'client_secret' => 'qsjTuI55MG50HQQo9CYsHrf2XwsqsR0e3lUzA5Tt',
            'redirect_uri' => $redirect_uri,
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});