<?php

use App\Http\Controllers\GameInfoController;
use App\Http\Controllers\UserDataController;
use App\Models\GameInfo;
use App\Models\Task;
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

include __DIR__."\admin.php";

Route::get('/logout', 'App\Http\Controllers\UserDataController@logout')->name('logout.perform');


Route::get('/login', function () {
    return view('frontend.sign-in');
})->name('user.login');

Route::post('login/submit', 'App\Http\Controllers\UserDataController@index')->name('login.submit');
Route::post('game/login/submit', 'App\Http\Controllers\UserDataController@gameLogin')->name('game.login.submit');


//FRONTED ROUTES
Route::get('/', function () {
    return view('frontend.index')->name("home");
});
Route::get('/index', function () {
    return view('frontend.index')->name("frontend.home");
});
Route::get('/home', function () {
    return view('frontend.index')->name("home");
});
Route::get('/game-info', function () {
    return view('frontend/game-info')->name("game_info");
});
Route::get('/sign-in', function () {
    return view('frontend/sign-in')->name("sign_in");
});
Route::get('/multiple-choice', function () {
    return view('frontend/multiple-choice')->name("multiple_choice");
});
Route::get('/task-qr', function () {
    return view('frontend/task-qr');
});
Route::get('/task-image', function () {
    return view('frontend.task-image')->name("task_image");
});
Route::get('/task-map', function () {
    return view('frontend.task-map')->name("task_map");
});
Route::get('/task-image', function () {
    return view('frontend.task-image')->name("task_image");
});
Route::get('/404', function () {
    return view('frontend.404')->name("404");
});
