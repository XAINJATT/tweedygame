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
                                <?php $game_info = @json_decode($data->game_info) ?>
                                <label for="game_title">Game Title *</label>
                                <input required value="{{@$game_info->game_title}}" placeholder="Game Title" class="form-control" type="text" name="game_title"
                                    id="game_title">
                            </div>
                            <div class="form-group">
                                <label for="game_code">Game Code *</label>
                                <input required placeholder="Game Code" value="{{@$data->game_code}}" class="form-control" type="text" name="game_code"
                                    id="game_code">
                            </div>
                            <div class="form-group">
                                <label for="game_password">Game Password *</label>
                                <input required placeholder="Game Password" value="" value="" class="form-control" type="password" name="game_password"
                                    id="game_password">
                            </div>
                            <div class="form-group">
                                <label for="game_info">Game Information</label>
                                <input type="text" value="{{@$game_info->overline}}" name="overline" class="form-control my-2" id="overline" placeholder="Overline">
                                <input type="text" value="{{@$game_info->headline}}" name="headline" class="form-control my-2" id="headline" placeholder="Headline">
                                <input type="text" value="{{@$game_info->subline}}" name="subline" class="form-control my-2" id="subline" placeholder="Subline">
                            </div>
                            <style>
                                #output {
                                    width: 100%;
                                    height: auto;
                                    object-fit: none;
                                    display: none;
                                }
                            </style>
                           
                            {{-- <div class="form-group">
                                <label for="game_type">Game Type *</label>
                                <select class="form-select" name="game_type" id="game_type">
                                    <option value="creative_image">Creative Image</option>
                                    <option value="mcqs">Multiple Choice Questions</option>
                                    <option value="qr_code">QR Code Scan</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="starting_point">Starting Point *</label>
                                <div class="input-group">
                                    <input required type="number" value="{{@$game_info->start->latitude}}" placeholder="Latitude" class="form-control" name="latitude" step="any"
                                        id="starting_point">
                                    <input required placeholder="Longitude" value="{{@$game_info->start->longitude}}" type="number" class="form-control" name="longitude" step="any"
                                        id="starting_point">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="starting_point">Time *</label>
                                <div class="input-group">
                                    <div>
                                        <label for="starting_time">Starting Time</label>
                                        <input required value="{{@$game_info->start->starting_time ?? date('Y-m-d\TH:i:s')}}" type="datetime-local" name="starting_point" class="form-control" step="any"
                                            name="starting_time" id="starting_time">
                                    </div>
                                    <div>
                                        <label for="ending_time">Ending Time *</label>
                                        <input required type="datetime-local" value="{{@$game_info->start->ending_time ?? date('Y-m-d\TH:i:s')}}" name="ending_time" class="form-control" step="any"
                                            id="ending_time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div  id="image_result">
                                    <img @if(!empty(@$game_info->game_image)) style="display:block !important" @endif class="img-fluid" width="360" height="600" src="{{asset('img/game/resize/').'/'.@$game_info->game_image->size_360x600 ?? asset('img/game/original/').@$game_info->game_image->orignal}}" alt=""
                                        id="output">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="game_image">Game Background Image *</label>
                                <input required accept="image/*" class="form-control" type="file" name="game_image"
                                    id="game_image">
                            </div>
                            <div class="form-group">
                                <label for="game_color">Game Text Color</label>
                                <input value="{{@$game_info->game_color ?? "#ffc107"}}" class="form-control form-control-color" type="color"
                                    name="game_color" id="game_color">
                            </div>

                            <div class="form-group">
                                <label for="bg_opacity">Background Opacity </label>
                                <input type="range" value="{{@$game_info->game_opacity ?? "0.5"}}" min="0" max="1" step="0.01"
                                    class="form-range" name="background_opacity" id="bg_opacity">
                            </div>


                            <div class="form-group">
                                <label for="game_desc">Game Instructions *</label>
                                <textarea required rows='4' placeholder="Game Instructions" class="form-control" type="text"
                                    name="game_instructions" id="game_desc">{{@$data->game_instructions}}</textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-warning form-control fs-4 rounded-0" type="submit"
                                    value="Next Step" name="create_game" id="create_game">
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
        $(document).ready(function() {

            $('#game_image').change(function(e) {
                var input = e.target;
                var reader = new FileReader();
                reader.onload = function() {
                    $('#output').attr('src', reader.result);
                    $('#output').show();
                };
                reader.readAsDataURL(input.files[0]);
            });

        });
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
                    if (response.success) {
                        $('#results')
                            .addClass('alert-success')
                            .removeClass('alert-danger')
                            .html(response.success);
                            $('#form').trigger("reset");
                    }
                },
                error: function(errors) {
                    $('#waveLoader').fadeOut();
                    $('#results')
                        .css({
                            "display": "flex"
                        })
                        .addClass('alert-danger')
                        .removeClass('alert-class')
                        .hide()
                        .fadeIn();
                    $('#results').html(errors.responseJSON.message);

                    console.log(errors.responseJSON.message);
                }
            });
        });
    </script>
@endsection
