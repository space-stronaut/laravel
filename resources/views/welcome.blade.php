@extends('layouts.app')

@section('content')
    <div class="jumbotron bg-transparent justify-content-around">
        <div class="row justify-content-between">
            <div class="text-section align-self-center">
                <h1 class="large-title">Make Your Business<br>More Classy</h1>
                <a href="#" class="btn btn-secondary">Start Your First Business</a>
            </div>
            <img src="{{ asset('img/drawkit-grape-pack-illustration-9.svg') }}" class="jumbo-img" alt="">
        </div>
    </div>

    <section id="cliens" class="cliens section-bg mb-5">
        <div class="container">
  
          <div class="row">
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('img/client-1.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('img/client-2.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('img/client-3.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('img/client-4.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('img/client-5.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('img/client-6.png') }}" class="img-fluid" alt="">
            </div>
  
          </div>
  
        </div>
      </section>
@endsection