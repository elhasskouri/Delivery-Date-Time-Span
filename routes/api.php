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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* question 1 */
Route::post('city','DeliveryController@citys');

/* question 2 */
Route::post('delivery-times','DeliveryController@Deliverys');

/* question 3 */
Route::post('city/{id}/delivery-times','DeliveryController@DeliverysCityId');

/* question 4 */
Route::post('TimeSpanParDate/{request}','DeliveryController@TimeSpanParDate');

/* question 5 */
Route::post('DateParTimeSpan/{request}','DeliveryController@DateParTimeSpan');

/* question 6*/
Route::post('city/{city_id}/delivery-dates-times/{number_of_days_to_get}','DeliveryController@Q6');

