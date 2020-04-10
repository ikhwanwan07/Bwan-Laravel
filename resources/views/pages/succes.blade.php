@extends('layouts.success')
@section('content')
<main>
      <div class="section-success d-flex align-item-center">
        <div class="col text-center">
          <img src="{{url('frontend/images/ic_mail.png')}}" alt="" />
          <h1>Yeay Suksess</h1>
          <p>
            We’ve sent you email for trip instruction
            <br />
            please read it as well
          </p>
          <a href="{{route('home')}}" class="btn btn-home-page mr-3 px-5">
            Home Page</a
          >
        </div>
      </div>
    </main>

@endsection