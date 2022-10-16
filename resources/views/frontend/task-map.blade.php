@extends("layouts.master")
@section("content")
    <div id="main">

      <div class="task card">
        <div class="card-img-top">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.76457405352!2d2.2769947256697827!3d48.8589465815324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2s!4v1664740743505!5m2!1sen!2s" style="border:0; width: 100%; height: 250px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="task-title card-header text-center">
          <h3 class="card-title">Your start point</h3>
        </div>
        <div class="text-description card-body">
          <p class="text text-center fs-4 ">
            This is were your team should start your
            game. <br>
            Please push start when you are in the
            right adress.  <br>
            
          </p>

        </div>
        <div class="card-footer pt-3">
          <button for="input-image" class="btn btn-warning form-control fs-4 rounded-0">START</button>
          <button href="#" class="text-muted btn btn-link text-center form-control mt-3">Skip</button>
        </div>
      </div>


    </div>
  @endsection