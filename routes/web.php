<?php

use DeepCopy\Filter\Doctrine\DoctrineCollectionFilter;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('homepage');
}); */

Auth::routes();
// dashboard
Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::get('/myReviews/{id}', 'HomeController@myReviews')->name('myReviews');
Route::get('/myMessages/{id}', 'HomeController@myMessages')->name('myMessages');


//guest route
Route::get('/', 'GuestController@index')->name('public.homepage');

Route::get('/advance', 'GuestController@advance');

Route::get('/doctor/{id}', 'GuestController@show')->name('show.doctor');
Route::post('vote/{vote}', 'VoteController@sendVote')->name('send.vote');

Route::resource('review', ReviewController::class)->only('create', 'store', 'edit', 'update');
Route::resource('message', MessageController::class);

//payment
Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');

//doctor route
Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
    Route::resource('doc', UserController::class);
    Route::get('sponsorship', 'SponsorController@index')->name('sponsorship');
    Route::post('sponsorship', 'SponsorController@store')->name('sponsorship.store');
    Route::get('chart-js/reviews/{id}', 'ChartController@reviewsChart')->name('chart.reviews');
});
