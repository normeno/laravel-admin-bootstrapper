<?php

Route::get('dashboard', [
    'as' => 'admin.dashboard.index',
    'uses' => 'Admin\DashboardController@index'
]);

Route::get('dashboard/registered_user', [
    'as' => 'admin.dashboard.registeredUser',
    'uses' => 'Admin\DashboardController@registeredUser'
]);