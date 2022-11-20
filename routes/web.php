<?php

use App\Http\Controllers\GameInfoController;
use App\Http\Controllers\UserDataController;
use App\Models\GameInfo;
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
            $data = GameInfoController::show(new GameInfo);
            return view('admin.manage_games')->with(['data' => $data]);
        })->name('game.manage');

        Route::post("game/add/submit", 'App\Http\Controllers\GameInfoController@store')->name('game.add.submit');

        Route::get("edit/{id}", function ($id) {
            $game_data = GameInfo::query()->where('id', $id)->first();
            return view('admin.add_games')->with(['data' => $game_data]);;
        })->name('game.edit');

        Route::get("delete/{id}", function ($id) {
            $game_data = GameInfo::query()->where('id', $id)->first();
            return view('admin.add_games')->with(['data' => $game_data]);
        })->name('game.delete');
        
    });

    Route::group(['prefix' => 'task'], function () {
        Route::get("add/{slug}", function ($slug) {
            $data = GameInfo::query()->where('slug',$slug)->first();
            return view('admin.add_task',["data"=>$data]);
        })->name('game.task.add');

        Route::get("manage", function () {
            $data = GameInfoController::show(new GameInfo);
            return view('admin.manage_games')->with(['data' => $data]);
        })->name('game.task.manage');

        Route::post("task/add/submit", 'App\Http\Controllers\TaskController@store')->name('task.add.submit');

        Route::get("edit/{id}", function ($id) {
            $game_data = GameInfo::query()->where('id', $id)->first();
            return view('admin.add_games')->with(['data' => $game_data]);;
        })->name('game.task.edit');

        Route::get("delete/{id}", function ($id) {
            $game_data = GameInfo::query()->where('id', $id)->first();
            return view('admin.add_games')->with(['data' => $game_data]);
        })->name('game.task.delete');
        
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
Route::get('/index', function () {
    return view('frontend.index');
});
Route::get('/home', function () {
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
