@extends('layouts.master')
@section('content')
    <div id="main">

        <div class="task card">
            <div class="task-image card-img-top">
                <img src="./img/eiffel-tower.png" alt="">
            </div>
            <div class="task-title card-header text-center">
                <h3 class="card-title">Task#1: Find the tower</h3>
            </div>
            <div class="text-description card-body">
                <p class="text text-center fs-4 ">
                    Just text about the game, time limit and
                    how to solve it. <br>
                    this text should also be restrictied so is
                    fits on maximum two screens
                    scrollingdown. <br>
                    bla bla bla bla bla bla bla bla blaJust
                    text about the game, time limit and how
                    to solve it. <br>

                </p>

            </div>
            <div class="card-footer pt-3">
                <input class="hidden d-none" type="file" id="input-image" accept="image/png, image/jpeg, image/jpg">
                <label for="input-image" class="btn btn-warning form-control fs-4 rounded-0">UPLOAD IMAGE</label>
                <button href="#" class="text-muted btn btn-link text-center form-control mt-3">Skip</button>
            </div>
        </div>


    </div>
@endsection
