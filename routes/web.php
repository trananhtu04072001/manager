<?php

use Illuminate\Support\Facades\File;
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
foreach (File::allFiles(__DIR__ . '/web') as $routeFile) {
    require $routeFile->getPathname();
}


Route::get('/', function () {
    return view('welcome');
});
