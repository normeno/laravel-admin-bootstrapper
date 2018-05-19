<?php

Route::resource('role_users', 'Admin\RoleUserController', [
    'as' => 'admin',
    'only' => ['index', 'store']
]);