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


Route::get('commit', [
    'uses'  => 'EshopController@commit',
    'as'    => 'commit'
]);


Route::post('/login', [
    'uses'  => 'EshopController@login',
    'as'    => 'login'
]);

Route::post('/registerUser', [
    'uses'  => 'EshopController@registerUser',
    'as'    => 'registerUser'
]);

Route::get('welcome', function () {
    session_start();
    return view('welcome');
})->name('welcome');

Route::get('welcomeUser', function () {
    session_start();
    return view('welcomeUser');
})->name('welcomeUser');

Route::post('addElectronicItem', [
    'uses'  => 'EshopController@addElectronicItem',
    'as'    => 'addElectronicItem'
]);
Route::get('addinventorymonitor', function () {
    session_start();
    return view('add.addinventorymonitor');
})->name('addinventorymonitor');

Route::get('addinventoryTablet', function () {
    session_start();
    return view('add.addinventoryTablet');
})->name('addinventoryTablet');

Route::get('addinventoryLaptop', function () {
    session_start();
    return view('add.addinventoryLaptop');
})->name('addinventoryLaptop');

Route::get('addinventoryDesktop', function () {
    session_start();
    return view('add.addinventoryDesktop');
})->name('addinventoryDesktop');

Route::get('viewInventoryDesktop/{type}', [
    'uses'  => 'EshopController@viewInventory',
    'as'    => 'viewInventoryDesktop'
]);

Route::get('viewInventoryMonitor/{type}',[
    'uses'  => 'EshopController@viewInventory',
    'as'    => 'viewInventoryMonitor'
]);

Route::get('viewInventoryLaptop/{type}', [
    'uses'  => 'EshopController@viewInventory',
    'as'    => 'viewInventoryLaptop'
]);

Route::get('viewInventoryTablet/{type}',[
    'uses'  => 'EshopController@viewInventory',
    'as'    => 'viewInventoryTablet'
]);

/*
Route::post('addElectronicItem', [
    'uses'  => 'EshopController@addElectronicItem',
    'as'    => 'addElectronicItem'
]);
*/

Route::get('deleteInventoryDesktop/{type}', [
    'uses'  => 'EshopController@deleteViewInventory',
    'as'    => 'deleteInventoryDesktop'
]);

Route::post('deleteElectronicItem', [
    'uses'  => 'EshopController@deleteElectronicItem',
    'as'    => 'deleteElectronicItem'
]);

Route::get('deleteInventoryMonitor/{type}',[
    'uses'  => 'EshopController@deleteViewInventory',
    'as'    => 'deleteInventoryMonitor'
]);

Route::get('deleteInventoryLaptop/{type}', [
    'uses'  => 'EshopController@deleteViewInventory',
    'as'    => 'deleteInventoryLaptop'
]);

Route::get('deleteInventoryTablet/{type}',[
    'uses'  => 'EshopController@deleteViewInventory',
    'as'    => 'deleteInventoryTablet'
]);


Route::get('modifyInventoryDesktop/{type}', [
    'uses'  => 'EshopController@modifyInventory',
    'as'    => 'modifyInventoryDesktop'
]);

Route::post('modifyDesktop/{type}', [
    'uses'  => 'EshopController@modifyElectronics',
    'as'    => 'modifyDesktop'
]);

Route::get('modifyInventoryLaptop/{type}', [
    'uses'  => 'EshopController@modifyInventory',
    'as'    => 'modifyInventoryLaptop'
]);

Route::post('modifyLaptop/{type}', [
    'uses'  => 'EshopController@modifyElectronics',
    'as'    => 'modifyLaptop'
]);

Route::get('modifyInventoryMonitor/{type}',[
    'uses'  => 'EshopController@modifyInventory',
    'as'    => 'modifyInventoryMonitor'
]);

Route::post('modifyMonitor/{type}', [
    'uses'  => 'EshopController@modifyElectronics',
    'as'    => 'modifyMonitor'
]);


Route::get('modifyInventoryTablet/{type}',[
    'uses'  => 'EshopController@modifyInventory',
    'as'    => 'modifyInventoryTablet'
]);

Route::post('modifyTablet/{type}', [
    'uses'  => 'EshopController@modifyElectronics',
    'as'    => 'modifyTablet'
]);


Route::get('logOut',[
    'uses'  => 'EshopController@logout',
    'as'    => 'logOut'
]);

?>
