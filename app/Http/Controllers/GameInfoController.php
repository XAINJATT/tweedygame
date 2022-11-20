<?php

namespace App\Http\Controllers;

use App\Models\GameInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Symfony\Component\Console\Input\Input;

class GameInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_image' => "max:12400",
            'game_code' => 'required',
            'game_password' => 'required_without:game__id',
            'game_instructions' => 'required',
            'game_title' => 'required'
        ]);

        if ($request->file('game_image')) {
            $image = $request->file('game_image');
            // return $image->getClientOriginalExtension();
            $img = Image::make($image);
            $file_360x600 = time() . '-size-360x600' . '.' . $image->getClientOriginalExtension();
            $file_original = time() . '-size-file-original' . '.' . $image->getClientOriginalExtension();


            $game_image =  ['size_360x600' => $file_360x600, 'original' => $file_original];


            $img->fit(360, 600, function ($constraint) {
                $constraint->upsize();
            });
            $save_path = public_path('img/game/resize/');
            $original_path = 'img/game/original/';
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            $img->save($save_path . $file_360x600);
            $image->storeAs($original_path, $file_original, ['disk' => 'upload_public']);
        } else {
            // return json_encode($request->image__name);
            if (request()->has('game__id')) {
                $game_image = ['size_360x600' => $request->size_360x600, 'original' => $request->original];
            } else {
                $request->validate([
                    'game_image' => "required|max:12400"
                ]);
            }
            // return print_r($game_image);
        }


        $game_info = [
            'game_title' => $request->game_title,
            'game_color' => $request->game_color,
            'game_opacity' => $request->background_opacity,
            'game_instructions' => $request->game_instructions,
            'game_information' => [
                'overline' => $request->overline,
                'headline' => $request->headline,
                'subline' => $request->subline
            ],
            'start' => [
                "longitude" => $request->longitude,
                'latitude' => $request->latitude,
                'starting_time' => $request->starting_time,
                'ending_time' => $request->ending_time
            ],
            'game_image' => $game_image
        ];
        // return $game_info;

        if (!empty(request('game__id'))) {
            $game = GameInfo::find($request->game__id);
            $msg = "Game settings have been updated successfully!";
        } else {
            $game = new GameInfo();
            $msg = 'Game added successfully now you can share the game code and password with participants';
        }
        $game->game_info = json_encode($game_info);
        $game->game_code = $request->game_code;
        $game->name = $request->game_title;
        $game->game_password = Hash::make($request->game_password);
        $game->created_by = Auth::user()->id;
        $game->game_type = 'Game Type';
        $game->game_desc = $request->game_instructions;

        if ($game->save()) {
            $slug = $game->slug;
            $redirect__msg_route = route('game.task.add',$slug);
            $redirect__msg = "<script> window.location.replace('$redirect__msg_route') </script>";
            // return $redirect__msg;
            return ['success' => $msg . $redirect__msg];
        } else {
            return ['error' => 'There is a problem while creating the game please try again!'] . die(500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameInfo  $gameInfo
     * @return \Illuminate\Http\Response
     */
    public static function show(GameInfo $gameInfo)
    {
        return $gameInfo->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameInfo  $gameInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(GameInfo $gameInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameInfo  $gameInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameInfo $gameInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameInfo  $gameInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameInfo $gameInfo)
    {
        //
    }
}
