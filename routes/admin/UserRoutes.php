<?php

Route::get('users/table', [
    'as' => 'admin.users.table',
    'uses' => 'Admin\UserController@table'
]);

Route::resource('users', 'Admin\UserController', [
    'as' => 'admin'
]);