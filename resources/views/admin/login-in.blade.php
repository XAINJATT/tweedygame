@extends('layouts.master')
@section('content')
    <div id="main">
        <div class="sign-in">
            <div class="sign-in-header pt-5 mb-5">
                <h2 class="text-center fw-bolder pt-5">Sign In</h2>
            </div>
            <form class="mx-5 mt-5" id="sign-in" action="{{ route('login.submit') }}">
                <div class="input-box mb-3 pb-4">
                    <label class="input-label">Email</label>
                    <input name='email' type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)" />
                </div>
                @csrf
                <div class="input-box mt-3 mb-5 pb-5">
                    <label class="input-label">Password</label>
                    <input type="password" name='password' class="input-1" onfocus="setFocus(true)"
                        onblur="setFocus(false)" />
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-warning form-control fs-4 rounded-0">SIGN IN</a>
                </div>
                <div id="results" style="display: none" class="alert alert-danger">

                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#sign-in').submit(function(e) {
            $('#waveLoader')
                .css("display", "flex")
                .hide()
                .fadeIn();
            $('#results').fadeOut();

            $('#results').html("");
            e.preventDefault();
            let $this = $(this);
            let form_data = new FormData($(this)[0]);
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
