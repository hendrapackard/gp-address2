<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->group(function () {
    Route::apiResources([
        'province' => 'ProvinceController',
        'village' => 'VillageController',
        'city' => 'CityController',
        'country' => 'CountryController',
        'sub-district' => 'SubDistrictController',
        'post-code' => 'PostCodeController',
        'address' => 'AddressController',
    ]);
});
