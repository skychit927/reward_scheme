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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

//Year

    Route::get('/years/delete/{id}', [
        'uses' => 'YearsController@delete',
        'as' => 'years.delete'
    ]);

    Route::get('/years/trashed', [
        'uses' => 'YearsController@trashed',
        'as' => 'years.trashed'
    ]);

    Route::get('/years/restore/{id}', [
        'uses' => 'YearsController@restore',
        'as' => 'years.restore'
    ]);

    Route::get('/years/choose/{id}', [
        'uses' => 'YearsController@choose',
        'as' => 'years.choose'
    ]);

    Route::resource('years','YearsController');

//Classroom

    Route::get('/classrooms/delete/{id}', [
        'uses' => 'ClassroomsController@delete',
        'as' => 'classrooms.delete'
    ]);

    Route::get('/classrooms/trashed', [
        'uses' => 'ClassroomsController@trashed',
        'as' => 'classrooms.trashed'
    ]);

    Route::get('/classrooms/restore/{id}', [
        'uses' => 'ClassroomsController@restore',
        'as' => 'classrooms.restore'
    ]);

Route::resource('classrooms','ClassroomsController');

//Activity_type

Route::get('/activity_types/delete/{id}', [
    'uses' => 'Activity_typesController@delete',
    'as' => 'activity_types.delete'
]);

Route::get('/activity_types/trashed', [
    'uses' => 'Activity_typesController@trashed',
    'as' => 'activity_types.trashed'
]);

Route::get('/activity_types/restore/{id}', [
    'uses' => 'Activity_typesController@restore',
    'as' => 'activity_types.restore'
]);

Route::resource('activity_types','Activity_typesController');

//Product_type

Route::get('/product_types/delete/{id}', [
    'uses' => 'Product_typesController@delete',
    'as' => 'product_types.delete'
]);

Route::get('/product_types/trashed', [
    'uses' => 'Product_typesController@trashed',
    'as' => 'product_types.trashed'
]);

Route::get('/product_types/restore/{id}', [
    'uses' => 'Product_typesController@restore',
    'as' => 'product_types.restore'
]);

Route::resource('product_types','Product_typesController');

//Activity

Route::get('/activities/delete/{id}', [
    'uses' => 'ActivitiesController@delete',
    'as' => 'activities.delete'
]);

Route::get('/activities/trashed', [
    'uses' => 'ActivitiesController@trashed',
    'as' => 'activities.trashed'
]);

Route::get('/activities/restore/{id}', [
    'uses' => 'ActivitiesController@restore',
    'as' => 'activities.restore'
]);

Route::resource('activities','ActivitiesController');


//Product

Route::get('/products/delete/{id}', [
    'uses' => 'ProductsController@delete',
    'as' => 'products.delete'
]);

Route::get('/products/trashed', [
    'uses' => 'ProductsController@trashed',
    'as' => 'products.trashed'
]);

Route::get('/products/restore/{id}', [
    'uses' => 'ProductsController@restore',
    'as' => 'products.restore'
]);

Route::resource('products','ProductsController');


//Transactions


Route::get('/transactions', [
    'uses' => 'TransactionsController@index',
    'as' => 'transactions.index'
]);

Route::get('transactions/add-to-cart/{id}', [
    'uses' => 'TransactionsController@getAddToCart',
    'as' => 'transactions.addToCart'
]);

Route::get('transactions/reduce/{id}', [
    'uses' => 'TransactionsController@getReduceByOne',
    'as' => 'transactions.reduceByOne'
]);

Route::get('transactions/remove/{id}', [
    'uses' => 'TransactionsController@getRemoveItem',
    'as' => 'transactions.remove'
]);

Route::get('transactions/ordering-cart', [
    'uses' => 'TransactionsController@getCart',
    'as' => 'transactions.ordering-cart'
]);

Route::get('/checkout', [
    'uses' => 'TransactionsController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'TransactionsController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);







});



