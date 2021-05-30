<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return 'login';
});

Route::get('/', function () {
    $app = new \Atk4\Ui\App(['title' => config('app.title'), 'always_run' => false]);
    $app->initLayout([\Atk4\Ui\Layout\Admin::class]);
    return $app->run();
});
