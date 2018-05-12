<?php

Route::get('permission_roles/table', [
    'as' => 'admin.permission_roles.table',
    'uses' => 'Admin\PermissionRoleController@table'
]);

Route::resource('permission_roles', 'Admin\PermissionRoleController', [
    'as' => 'admin'
]);