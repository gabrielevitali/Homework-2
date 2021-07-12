<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

# Homepage
Route::get('homepage', 'HomepageController@index'); 

# Login, Logout e Signup
Route::get('login_signup', 'LoginSignupController@index');
Route::post('login_signup', 'LoginSignupController@loginOrSignup');
Route::get('logout', 'LoginSignupController@logout');
Route::get('login_signup/username/{q}', 'LoginSignupController@checkUsername');
Route::get('login_signup/email/{q}', 'LoginSignupController@checkEmail');

# Area Riservata
Route::get('reservedArea', 'ReservedAreaController@home'); 
Route::get('reservedArea/{id}', 'ReservedAreaController@deleteBooking'); 
Route::get("reservedArea/spotify/{album}", "ReservedAreaController@searchAlbumOnSpotify");

# Check-In
Route::get('checkin', 'CheckInController@index');
Route::get('checkin/data/{q1}/{q2}', 'CheckInController@checkIn');

# InfoVoli
Route::get('infoVoli', 'SearchFlightController@index');
Route::get('infoVoli/id/{q}', 'SearchFlightController@searchByID');
Route::get('infoVoli/airportsDate/{q1}/{q2}/{q3}', 'SearchFlightController@searchByAirportsDate');

# AcquistaVolo
Route::get('acquistoVolo', 'BuyFlightController@index');
Route::get('acquistoVolo/search/{q1}', 'BuyFlightController@searchByDate');
Route::get('acquistoVolo/search/{q1}/{q2}', 'BuyFlightController@searchByDepartureAirportDate');
Route::get('acquistoVolo/search/{q1}/{q2}/{q3}', 'BuyFlightController@searchByAirportsDate');
Route::post('acquistoVolo', 'BuyFlightController@buyFlight');

# AbbonamentoClub
Route::get('abbonamentoClub', 'JoinClubController@index');
Route::get('abbonamentoClub/data/{q1}/{q2}', 'JoinClubController@joinClub');
Route::get('abbonamentoClub/username/{q}', 'LoginSignupController@checkUsername');