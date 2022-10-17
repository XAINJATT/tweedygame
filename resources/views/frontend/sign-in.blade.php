@extends('layouts.master')
@section('content')
    <div id="main">
        <div class="sign-in">
            <div class="sign-in-header pt-5 mb-5">
                <h2 class="text-center fw-bolder pt-5">Sign In</h2>
            </div>
            <form class="mx-5 mt-5" id="sign-in" action="{{route('login.submit')}}">
                <div class="input-box mb-3 pb-4">
                    <label class="input-label">Gamecode</label>
                    <input name='game_code' type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)" />
                </div>
                @csrf
                <div class="input-box mt-3 mb-5 pb-5">
                    <label class="input-label">Password</label>
                    <input type="password" name='password' class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)" />
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-warning form-control fs-4 rounded-0">SIGN IN</a>
                </div>
                
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    $('#sign-in').submit(function (e) { 
      e.preventDefault();
      let $this = $(this);
      let form_data = new FormData($(this)[0]);
      $.ajax({
        type:'post',
        url: $this.attr('action'),
        data: form_data,
        dataType:false,
        processData: false,
        success: function (response) {
          console.log('success');
        }
      });
    });
</script>
@endsection