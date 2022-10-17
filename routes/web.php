<?php

use App\Http\Controllers\UserDataController;
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

//ADMIN ROUTES
Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    //GAME ROUTES
    Route::group(['prefix' => 'game'], function () {

        Route::get("add", function () {
            return view('admin.add_games');
        })->name('game.add');

        Route::get("manage", function () {
            return view('admin.manage_games');
        })->name('game.manage');

        Route::post("game/add/submit", 'App\Http\Controllers\GameInfoController@store')->name('game.add.submit');

        Route::get("edit/{id}", function () {
            return view('admin.add_games');
        })->name('game.edit');
    });

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.home');
});

Route::get('admin/login', function () {
    return view('admin.login-in');
})->name('admin.login');


Route::get('/logout', 'App\Http\Controllers\UserDataController@logout')->name('logout.perform');


Route::get('/login', function () {
    return view('frontend.sign-in');
})->name('user.login');

Route::post('login/submit', 'App\Http\Controllers\UserDataController@index')->name('login.submit');


//FRONTED ROUTES
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/game-info', function () {
    return view('frontend.game-info');
});
Route::get('/sign-in', function () {
    return view('frontend.sign-in');
});
Route::get('/multiple-choice', function () {
    return view('frontend.multiple-choice');
});
Route::get('/task-qr', function () {
    return view('frontend.task-qr');
});
Route::get('/task-image', function () {
    return view('frontend.task-image');
});
Route::get('/task-map', function () {
    return view('frontend.task-map');
});
Route::get('/task-image', function () {
    return view('frontend.task-image');
});
Route::get('/404', function () {
    return view('frontend.404');
});
