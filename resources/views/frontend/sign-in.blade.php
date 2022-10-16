@extends('layouts.master')
@section('content')
    <div id="main">
        <div class="sign-in">
            <div class="sign-in-header pt-5 mb-5">
                <h2 class="text-center fw-bolder pt-5">Sign In</h2>
            </div>
            <form class="mx-5 mt-5" action="">
                <div class="input-box mb-3 pb-4">
                    <label class="input-label">Gamecode</label>
                    <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)" />
                </div>
                <div class="input-box mt-3 mb-5 pb-5">
                    <label class="input-label">Password</label>
                    <input type="password" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)" />
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-warning form-control fs-4 rounded-0">SIGN IN</a>
                </div>
            </form>
        </div>
    </div>
@endsection
