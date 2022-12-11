<?php

use App\Http\Controllers\GameInfoController;
use App\Http\Controllers\UserDataController;
use App\Models\GameInfo;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin:admin', "name"=>"admin."], function () {
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
            $data = GameInfo::query()->where('slug', $slug)->first();
            $game_id = $data->id;
            $task_data = Task::query()->where('game_id', $game_id)->first();
            return view('admin.add_task', ["data" => $data, 'task_data' => $task_data]);
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
