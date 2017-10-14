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

Route::get('/', function () {
    return view('login');
});


Route::post('/login', [
    'uses'  => 'EshopController@login',
    'as'    => 'login'
]);

Route::post('addElectronicItem', [
    'uses'  => 'EshopController@addElectronicItem',
    'as'    => 'addElectronicItem'
]);
Route::get('addinventorymonitor', function () {
    return view('addinventorymonitor');
})->name('addinventorymonitor');

Route::get('addinventoryTablet', function () {
    return view('addinventoryTablet');
})->name('addinventoryTablet');

Route::get('addinventoryLaptop', function () {
    return view('addinventoryLaptop');
})->name('addinventoryLaptop');

Route::get('addinventoryDesktop', function () {
    return view('addinventoryDesktop');
})->name('addinventoryDesktop');

?>