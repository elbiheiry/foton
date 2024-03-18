<?php

use Illuminate\Routing\Router;
use Encore\Admin\Layout\Content;
use App\Admin\Controllers\SettingController;
use App\Models\Setting;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('home-sliders', HomeSliderController::class);
    $router->resource('services', ServiceController::class);
    $router->resource('offers', OfferController::class);
    $router->resource('news', BlogController::class);
    $router->resource('contact-us', ContactUsController::class);
    $router->resource('images-gallaries', ImagesGallaryController::class);
    $router->resource('events', EventController::class);
    $router->resource('video-gallaries', VideoGallaryController::class);
    $router->resource('careers', CareerController::class);
    $router->resource('applications', ApplicationController::class);
    $router->resource('vehicle-types', VehicleTypeController::class);
    $router->resource('specs', SpecController::class);
    $router->resource('test-drives', TestDriveController::class);
    $router->resource('spare-parts', SparePartController::class);
    $router->resource('abouts', AboutController::class);
    $router->resource('service-center', AfterSaleController::class);
    $router->resource('dealers', DealerController::class);
    $router->resource('branches', BranchController::class);
    $router->resource('vehicles', VehicleController::class);
    $router->resource('vehicle-sliders', VehicleSliderController::class);
    $router->resource('vehicle-models', VehicleModelController::class);
    $router->resource('cities', CityController::class);
    $router->resource('states', StateController::class);
    $router->resource('countries', CountryController::class);
    $router->resource('vehicle-type-sliders', VehicleTypeSliderController::class);
    $router->resource('page-settings', PageSettingController::class);
    $router->resource('footer-fetures', FooterFeturesController::class);

    $router->get('api/city','AfterSaleController@cities')->name('searchCity');
    $router->get('api/state','CityController@states')->name('searchState');
    $router->get('api/country','CityController@country')->name('searchCountry');

    $router->get('settings', function(Content $content,SettingController $SettingController){
        $settings = Setting::orderBy('id','desc')->first();

        if($settings){
            return $content
                ->title('Settings')
                ->body($SettingController->form('edit',$settings->id)->edit($settings->id));
        }else {
            return $content
                ->title('Settings')
                ->body($SettingController->form());
        }
    });
    $router->post('settings/store', 'SettingController@store');
    $router->put('settings/update/{setting}', 'SettingController@update');
});
