@extends('layouts.master')
@section('content')
    <div id="main">

        <div class="task card">
            <div class="qr-image card-img-top">
                <img src="./img/qr-sample.png" alt="">
            </div>
            <div class="task-title card-header text-center">
                <h3 class="card-title">FIND THE QR CODE</h3>
            </div>
            <div class="text-description card-body">
                <p class="text text-center fs-4 ">
                    Go to Sony Departments store and <br>
                    look for the QR code we have hidden <br>
                    in the female bathroom. <br>
                    Scan it . <br>

                </p>

            </div>
            <div class="card-footer pt-3">
                <input class="hidden d-none" type="file" id="input-image" accept="image/png, image/jpeg, image/jpg">
                <label for="input-image" class="btn btn-warning form-control fs-4 rounded-0">OPEN CAMERA AND SCAN
                    CODE</label>
                <button href="#" class="text-muted btn btn-link text-center form-control mt-3">Skip</button>
            </div>
        </div>


    </div>
@endsection
