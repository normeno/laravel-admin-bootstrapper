<?php

Route::get('roles/table', [
    'as' => 'admin.roles.table',
    'uses' => 'Admin\RoleController@table'
]);

Route::resource('roles', 'Admin\RoleController', [
    'as' => 'admin'
]);