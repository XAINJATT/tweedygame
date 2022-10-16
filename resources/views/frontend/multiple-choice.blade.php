@extends('layouts.master')
@section('content')
    <div id="main">

        <div class="task card">
            <!-- <div class="qr-image card-img-top">
              <img src="./img/qr-sample.png" alt="">
            </div> -->
            <div class="task-title card-header text-center">
                <h3 class="card-title">Task#3: Quiz time</h3>
            </div>
            <div class="text-description card-body fs-4">
                <p class="question">How many city districts is there in Paris?</p>

                <form action="">
                    <div class="form-group">
                        <input type="radio" class="cursor-pointer" name="answer" id="23">
                        <label class="px-3 cursor-pointer" for="23">23</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" class="cursor-pointer" name="answer" id="12">
                        <label class="px-3 cursor-pointer" for="12">12</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" class="cursor-pointer" name="answer" id="21">
                        <label class="px-3 cursor-pointer" for="21">21</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" class="cursor-pointer" name="answer" id="49">
                        <label class="px-3 cursor-pointer" for="49">49</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" class="cursor-pointer" name="answer" id="28">
                        <label class="px-3 cursor-pointer" for="28">28</label>
                    </div>
                </form>
            </div>
            <div class="card-footer pt-3">
                <input class="hidden d-none" type="file" id="input-image" accept="image/png, image/jpeg, image/jpg">
                <label for="input-image" class="btn btn-warning form-control fs-4 rounded-0 text-uppercase">NEXT
                    QUESTION</label>
                <button href="#" class="text-muted btn btn-link text-center form-control mt-3">Skip</button>
            </div>
        </div>


    </div>
@endsection
