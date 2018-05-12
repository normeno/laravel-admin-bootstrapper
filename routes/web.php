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

Route::group(['prefix' => 'admin', /*'middleware' => 'auth'*/], function () {
    require_once 'admin/DashboardRoutes.php';
    require_once 'admin/UserRoutes.php';
    require_once 'admin/RoleRoutes.php';
    require_once 'admin/PermissionRoutes.php';
    require_once 'admin/PermissionRoleRoutes.php';
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
