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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route Admin
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    /**
     * CRUD User
     */
    Route::get('/user', 'UserController@index')->name('list.users');
    Route::post('/user/{id}/update', 'UserController@update')->name('update.user');
    Route::post('/user/create', 'UserController@store')->name('create.user');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('delete.user');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile/update', 'UserController@updateProfile')->name('update.profile');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('edit.user');
    Route::post('/user/{id}/update/permission', 'UserController@updatePermissionUser')->name('update.permission.user');
    /**
     * CRUD Customer
     */
    Route::get('/customer', 'CustomerController@index')->name('list.customer');
    Route::get('/customer/create', 'CustomerController@create')->name('create.customer');
    Route::post('/customer/store', 'CustomerController@store')->name('store.customer');
    Route::get('/customer/{id}/edit', 'CustomerController@edit')->name('edit.customer');
    Route::post('/customer/{id}/update', 'CustomerController@update')->name('update.customer');
    Route::get('/customer/{id}/delete', 'CustomerController@destroy')->name('delete.customer');
    Route::get('/customer/{id}/show', 'CustomerController@show')->name('show.customer');
    Route::get('/customer/{id}/activity', 'CustomerController@activity')->name('activity.customer');
    Route::get('/customer/export', 'CustomerController@export')->name('export.customer');
    Route::post('/customer/upload', 'CustomerController@upload')->name('upload.customer');
    /**
     * CRUD Role & Permission
     */
    Route::get('/role', 'UserController@listRole')->name('list.role');
    Route::post('/role/create', 'UserController@createRole')->name('create.role');
    Route::get('/role/{id}/edit', 'UserController@editRole')->name('edit.role');
    Route::post('/role/{id}/update', 'UserController@updateRole')->name('update.role');
    Route::get('/role/{id}/delete', 'UserController@deleteRole')->name('delete.role');

    Route::get('/permission', 'UserController@listPermission')->name('list.permission');
    Route::post('/permission/create', 'UserController@createPermission')->name('create.permission');
    Route::post('/permission/{id}/update', 'UserController@updatePermission')->name('update.permission');
    Route::get('/permission/{id}/delete', 'UserController@deletePermission')->name('delete.permission');


    /**
     * CRUD Halte
     */
    Route::get('/halte', 'HalteController@index')->name('list.halte');
    Route::get('/halte/create', 'HalteController@create')->name('create.halte');
    Route::post('/halte/store', 'HalteController@store')->name('store.halte');
    Route::get('/halte/{id}/edit', 'HalteController@edit')->name('edit.halte');
    Route::post('/halte/{id}/update', 'HalteController@update')->name('update.halte');
    Route::post('/halte/upload', 'HalteController@upload')->name('upload.halte');
    Route::post('/halte/new/upload', 'HalteController@uploadNewHalte')->name('upload.new.halte');
    Route::get('/halte/{id}/delete', 'HalteController@destroy')->name('delete.halte');

    /**
     * CRUD Armada
     */
    Route::get('/armada', 'ArmadaController@index')->name('list.armada');
    Route::get('/armada/create', 'ArmadaController@create')->name('create.armada');
    Route::post('/armada/store', 'ArmadaController@store')->name('store.armada');
    Route::get('/armada/{id}/edit', 'ArmadaController@edit')->name('edit.armada');
    Route::post('/armada/{id}/update', 'ArmadaController@update')->name('update.armada');
    Route::post('/armada/upload', 'ArmadaController@upload')->name('upload.armada');
    Route::post('/armada/new/upload', 'ArmadaController@uploadNewArmada')->name('upload.new.armada');
    Route::get('/armada/{id}/delete', 'ArmadaController@destroy')->name('delete.armada');

    /**
     * CRUD Promo
     */
    Route::get('/promo', 'PromoController@index')->name('list.promo');
    Route::get('/promo/create', 'PromoController@create')->name('create.promo');
    Route::post('/promo/store', 'PromoController@store')->name('store.promo');
    Route::get('/promo/{id}/edit', 'PromoController@edit')->name('edit.promo');
    Route::post('/promo/{id}/update', 'PromoController@update')->name('update.promo');
    Route::post('/promo/upload', 'PromoController@upload')->name('upload.promo');
    Route::post('/promo/new/upload', 'PromoController@uploadNewPromo')->name('upload.new.promo');
    Route::get('/promo/{id}/delete', 'PromoController@destroy')->name('delete.promo');

});

Route::get('new', function(){
    return view('new');
});
