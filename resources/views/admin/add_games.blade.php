@extends('layouts.admin')
@section('content')
    <div id="main">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('game.add.submit') }}" method="POST" id="form">
                        <fieldset>
                            <legend class="text-center">
                                Add New Game
                            </legend>
                            <div class="form-group">
                                <label for="game_title">Game Title</label>
                                <input placeholder="Game Title" class="form-control" type="text" name="game_title"
                                    id="game_title">
                            </div>
                            <div class="form-group">
                                <label for="game_code">Game Code</label>
                                <input placeholder="Game Code" class="form-control" type="text" name="game_code"
                                    id="game_code">
                            </div>
                            <div class="form-group">
                                <label for="game_password">Game Password</label>
                                <input placeholder="Game Password" class="form-control" type="text" name="game_password"
                                    id="game_password">
                            </div>
                            <div class="form-group">
                                <label for="game_info">Game Info</label>
                                <textarea rows='4' placeholder="Game Info" class="form-control" type="text" name="game_info"
                                    id="game_info"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="game_image">Game Background Image</label>
                                <input accept="image/*" class="form-control" type="file" name="game_image"
                                    id="game_image">
                            </div>
                            <div class="form-group">
                                <label for="game_color">Game Background Color</label>
                                <input class="form-control form-control-color" type="color" name="game_color"
                                    id="game_color">
                            </div>
                            <div class="form-group">
                                <label for="bg_opacity">Background Opacity</label>
                                <input type="range" min="0" max="1" step="0.01" class="form-range" name="background_opacity" id="bg_opacity">
                            </div>
                            

                            <div class="form-group">
                                <label for="game_desc">Game Instructions</label>
                                <textarea rows='4' placeholder="Game Instructions" class="form-control" type="text" name="game_desc" id="game_desc"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-warning form-control fs-4 rounded-0" type="submit" name="create_game"
                                    id="create_game">
                            </div>
                            <div class="form-group">
                                <div id="results" style="display: none" class="alert alert-danger">

                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#form').submit(function(e) {
            $('#waveLoader')
                .css("display", "flex")
                .hide()
                .fadeIn();
            $('#results').fadeOut();

            $('#results').html("");
            e.preventDefault();
            let $this = $(this);
            let form_data = new FormData($(this)[0]);
            // let image_file = $('#game_image')[0].files[0];
            // form_data.append('background_image',image_file);
            $.ajax({
                type: 'post',
                url: $this.attr('action'),
                data: form_data,
                dataType: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#waveLoader').fadeOut();
                    console.log('success');
                    $('#results')
                        .css("display", "flex")
                        .hide()
                        .fadeIn();
                    $('#results').html(response);
                },
                error: function(errors) {
                    $('#waveLoader').fadeOut();
                    $('#results')
                        .css("display", "flex")
                        .hide()
                        .fadeIn();
                    $('#results').html(errors.responseJSON.message);
                    console.log(errors.responseJSON.message);
                }
            });
        });
    </script>
@endsection
