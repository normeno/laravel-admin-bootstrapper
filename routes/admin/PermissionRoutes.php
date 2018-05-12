<?php

Route::get('permissions/table', [
    'as' => 'admin.permissions.table',
    'uses' => 'Admin\PermissionController@table'
]);

Route::resource('permissions', 'Admin\PermissionController', [
    'as' => 'admin'
]);