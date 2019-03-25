<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    // user CRUD
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::post('users_restore/{id}', ['uses' => 'UsersController@restore', 'as' => 'users.restore']);
    Route::delete('users_del/{id}', ['uses' => 'UsersController@perma_del', 'as' => 'users.perma_del']);

    Route::resource('prize_types', 'PrizeTypesController');
    Route::post('prize_types_mass_destroy', ['uses' => 'PrizeTypesController@massDestroy', 'as' => 'prize_types.mass_destroy']);
    Route::post('prize_types_restore/{id}', ['uses' => 'PrizeTypesController@restore', 'as' => 'prize_types.restore']);
    Route::delete('prize_types_del/{id}', ['uses' => 'PrizeTypesController@perma_del', 'as' => 'prize_types.perma_del']);

    Route::resource('prizes', 'PrizesController');
    Route::post('prizes_mass_destroy', ['uses' => 'PrizesController@massDestroy', 'as' => 'prizes.mass_destroy']);
    Route::post('prizes_restore/{id}', ['uses' => 'PrizesController@restore', 'as' => 'prizes.restore']);
    Route::delete('prizes_del/{id}', ['uses' => 'PrizesController@perma_del', 'as' => 'prizes.perma_del']);

    Route::resource('activities', 'ActivitiesController');
    Route::post('activities_mass_destroy', ['uses' => 'ActivitiesController@massDestroy', 'as' => 'activities.mass_destroy']);
    Route::post('activities_restore/{id}', ['uses' => 'ActivitiesController@restore', 'as' => 'activities.restore']);
    Route::delete('activities_del/{id}', ['uses' => 'ActivitiesController@perma_del', 'as' => 'activities.perma_del']);

    Route::resource('activity_types', 'ActivityTypesController');
    Route::post('activity_types_mass_destroy', ['uses' => 'ActivityTypesController@massDestroy', 'as' => 'activity_types.mass_destroy']);
    Route::post('activity_types_restore/{id}', ['uses' => 'ActivityTypesController@restore', 'as' => 'activity_types.restore']);
    Route::delete('activity_types_del/{id}', ['uses' => 'ActivityTypesController@perma_del', 'as' => 'activity_types.perma_del']);

    Route::get('activity_records', ['uses' => 'RecordsController@activityRecord', 'as' => 'records.activity']);
    Route::get('prize_records', ['uses' => 'RecordsController@prizeRecord', 'as' => 'records.prize']);
    Route::get('sticker_records', ['uses' => 'RecordsController@StickerRecord', 'as' => 'records.sticker']);

});
