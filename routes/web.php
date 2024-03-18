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

const days = [
    'sat'  => 'Saturday',
    'sun'  => 'Sunday',
    'mon'  => 'Monday',
    'tue'  => 'Tuesday',
    'wed'  => 'Wednesday',
    'thur' => 'Thursday',
    'fri'  => 'Friday'
];

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/vehicles', 'VehicleController@index')->name('vehicles');
    Route::get('/vehicle/{vehicle}', 'VehicleController@show')->name('vehicle-details');
    Route::get('/offers', 'OfferController@index')->name('offers');
    Route::get('/offer/{offer}', 'OfferController@show')->name('offer-details');
    Route::get('/services', 'ServiceController@index')->name('services');
    Route::get('/events', 'EventController@index')->name('events');
    Route::get('/event/{event}', 'EventController@show')->name('event-details');
    Route::get('/news', 'BlogController@index')->name('blogs');
    Route::get('/news/{blog}', 'BlogController@show')->name('blog-details');
    Route::get('/branches', 'BranchController@index')->name('branches');
    Route::get('/images-gallary', 'GallaryController@images')->name('images-gallary');
    Route::get('/images-gallary/{gallary}', 'GallaryController@image_show')->name('images-gallary-details');
    Route::get('/videos-gallary', 'GallaryController@videos')->name('videos-gallary');
    Route::get('/about-amg', 'AboutController@amg')->name('about-amg');
    Route::get('/about-foton', 'AboutController@foton')->name('about-foton');
    Route::get('/about-tvd', 'AboutController@tvd')->name('about-tvd');
    Route::get('/careers', 'CareerController@index')->name('careers');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::get('/after-sale', 'AfterSaleController@index')->name('after-sale');
    Route::get('/loadPartName', 'AfterSaleController@load_part_name')->name('loadPartName');
    Route::get('/loadParts', 'AfterSaleController@load_parts')->name('loadParts');
    Route::get('/dealers', 'DealerController@index')->name('dealers');
    Route::get('/loadCities', 'DealerController@load_cities')->name('loadCities');
    Route::get('/loadDealers', 'DealerController@load_dealers')->name('loadDealers');
    Route::get('test-drive', 'TestDriveController@index')->name('test-drive');
    Route::post('application', 'CareerController@application')->name('application');
    Route::post('oncontact', 'ContactController@onContact')->name('onContact');
    Route::post('onTestDrive', 'TestDriveController@onTestDrive')->name('onTestDrive');
    Route::post('search', 'VehicleController@search')->name('search');
    Route::get('/loadMaintenance','AfterSaleController@load_maintenance')->name('loadmaintenance');
    
    //contact form
	Route::get('/contact-form' , ['as' => 'site.contact' , 'uses' => 'NewContactController@getIndex']);
	Route::post('/contact-form' , ['as' => 'site.contact' , 'uses' => 'NewContactController@postIndex']);
	Route::get('/thanks' , ['as' => 'site.thanks' , 'uses' => 'NewContactController@getThanks']);
});
