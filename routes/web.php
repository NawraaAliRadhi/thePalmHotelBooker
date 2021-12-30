<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index');
Route::get('/rooms', 'Client\RoomController@rooms');
Route::get('/auth/login', 'Client\Auth\AuthController@login')->name('auth.login');
Route::post('/auth/login', 'Client\Auth\AuthController@processLogin');
Route::get('/auth/register', 'Client\Auth\AuthController@register');
Route::post('/auth/register', 'Client\Auth\AuthController@processRegister');
Route::get('/auth/logout', 'Client\Auth\AuthController@logout');
Route::get('/reserve', 'Client\RoomController@reserve');
Route::get('/book-room/{room}', 'Client\ReservationController@show')->middleware('auth');
Route::get('/room/{room}', 'Client\ReservationController@viewRoom');
Route::post('/book-room/{room}', 'Client\ReservationController@store')->middleware('auth');
Route::get('/confirmation/{room}/{reservation}', 'Client\ReservationController@confirmation')->middleware('auth');
Route::prefix('dashboard')->group(function () {
    Route::get('/', 'Client\DashboardController@index')->name('client.reservations')->middleware(['auth']);
    Route::get('/profile', 'Client\DashboardController@editProfile')->name('client.reservations')->middleware(['auth']);
    Route::post('/profile', 'Client\DashboardController@updateProfile')->name('client.reservations')->middleware(['auth']);
    Route::get('/booking/cancel/{id}', 'Client\DashboardController@cancelReservation')->name('client.reservations')->middleware(['auth']);
    Route::get('/add-review/{room}', 'Client\DashboardController@reviewRoom')->name('client.reservations')->middleware(['auth']);
    Route::post('/add-review/{room}', 'Client\DashboardController@saveReview')->name('client.reservations')->middleware(['auth']);
    Route::get('/reviews', 'Client\DashboardController@reviews')->name('client.reservations')->middleware(['auth']);
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->middleware(['auth', 'isAdmin']);
    Route::get('/dashboard', 'DashboardController@index')->middleware(['auth', 'isAdmin']);

    //Auth
    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login', 'AuthController@processLogin');
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');

    //Rooms
    Route::prefix('rooms')->group(function () {
        Route::get('/', 'RoomController@index')->name('admin.list.room')->middleware(['auth', 'isAdmin']);
        Route::get('/create', 'RoomController@create')->name('admin.create.room')->middleware(['auth', 'isAdmin']);
        Route::post('/create', 'RoomController@store')->name('admin.store.room')->middleware(['auth', 'isAdmin']);
        Route::post('/delete/{room}', 'RoomController@delete')->name('admin.delete.room')->middleware(['auth', 'isAdmin']);
        Route::get('/show/{room}', 'RoomController@show')->name('admin.show.room')->middleware(['auth', 'isAdmin']);
        Route::get('/update/{room}', 'RoomController@edit')->name('admin.edit.room')->middleware(['auth', 'isAdmin']);
        Route::post('/update/{room}', 'RoomController@update')->name('admin.update.room')->middleware(['auth', 'isAdmin']);
        Route::get('/image/delete/{roomImage}', 'RoomController@deleteImage')->name('admin.delete.room_image')->middleware(['auth', 'isAdmin']);
    });

    Route::prefix('reports')->group(function () {
        Route::get('/reservations', 'DashboardController@reservationReports')->name('admin.list.report.reservation')->middleware(['auth', 'isAdmin']);
        Route::get('/users', 'DashboardController@userReports')->name('admin.list.report.user')->middleware(['auth', 'isAdmin']);
        Route::get('/rooms', 'DashboardController@roomReports')->name('admin.list.report.room')->middleware(['auth', 'isAdmin']);
    });

    Route::prefix('reservations')->group(function () {
        Route::get('/', 'ReservationController@index')->name('admin.list.reservations')->middleware(['auth', 'isAdmin']);
        Route::post('/approve/{reservation}', 'ReservationController@approve')->name('admin.approve.reservations')->middleware(['auth', 'isAdmin']);
    });
});