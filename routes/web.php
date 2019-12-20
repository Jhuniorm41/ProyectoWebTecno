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
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
//PERSONALIZACION COLORES
    Route::post('color', 'UsersController@color')->name('color');
//CASO DE USO 1 GESTIONAR USUARIO
//GESTIONAR CLIENTE
    Route::resource('clients', 'ClientsController');
//GESTIONAR PERSONAL
    Route::resource('personals', 'PersonalsController');
//CASO DE USO 2 GESTIONAR PRODUCTOS

    Route::resource('products', 'ProductsController');
//CASO DE USO 3 GESTIONAR MANTENIMIENTOS
    Route::resource('maintenances', 'MaintenancesController');
//CASO DE USO 4 GESTIONAR GARANTIAS
    Route::resource('warranties', 'WarrantiesController');
//CASO DE USO 5 GESTIONAR RESERVAS
    Route::resource('reservations', 'ReservationsController');
//CASO DE USO 6 GESTIONAR COTIZACIONES
    Route::resource('quotes', 'QuotesController');
    Route::resource('quotesdetail', 'QuotesDetailController');
//CASO DE USO 7 GESTIONAR PROMOCIONES
    Route::resource('promotions', 'PromotionsController');
//CASO DE USO 8 ESTADISTICAS Y REPORTES
    Route::get('/stats', 'StatsController@index')->name('stats.index');
});

Route::post('products/reporte', ['as' => 'products.reporte_reparaciones', 'uses' => 'ProductsController@reportReparaciones']);

