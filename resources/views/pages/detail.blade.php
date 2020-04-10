@extends('layouts.app')
@section('tittle','Detail Travel')

@push('addon-style')
<link
      href="https://fonts.googleapis.com/css?family=Assistant&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,800|Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.css" />
    
    <link rel="stylesheet" href="frontend/styles/main.css" />


@endpush

@section('content')
<main>
      <div class="section-detail-header"></div>
      <div class="section-detail-content">
        <div class="container">
          <div class="row">
            <div class="col p-0">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    Paket Travel
                  </li>
                  <li class="breadcrumb-item active">
                    Detail
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">
            <h1>{{ $item->title }}</h1>
            <p>
              {{ $item->location }}
            </p>
            @if($item->galleries->count() > 0)
                  <div class="gallery">
                      <div class="xzoom-container">
                          <img
                              src="{{ Storage::url($item->galleries->first()->image) }}"
                              class="xzoom"
                              id="xzoom-default"
                              xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                          />
                      </div>
                      <div class="xzoom-thumbs">
                          @foreach($item->galleries as $gallery)
                              <a href="{{ Storage::url($gallery->image) }}">
                                  <img
                                      src="{{ Storage::url($gallery->image) }}"
                                      class="xzoom-gallery"
                                      width="128"
                                      xpreview="{{ Storage::url($gallery->image) }}"
                                  />
                              </a>
                          @endforeach
                      </div>
                  </div>
            @endif
            <h2>Tentang Wisata</h2>
            {!! $item->about !!}
            <div class="features row">
              <div class="col-md-4">
                <img
                  src="{{ url('frontend/images/ic_event.png') }}"
                  alt=""
                  class="features-image"
                />
                <div class="description">
                  <h3>Featured Event</h3>
                  <p>{{ $item->featured_event }}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <div class="description">
                  <img
                    src="{{ url('frontend/images/ic_language.png') }}"
                    alt=""
                    class="features-image"
                  />
                  <div class="description">
                    <h3>Language</h3>
                    <p>{{ $item->language }}</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <div class="description">
                  <img
                    src="{{ url('frontend/images/ic_foods.png') }}"
                    alt=""
                    class="features-image"
                  />
                  <div class="description">
                    <h3>Foods</h3>
                    <p>{{ $item->foods }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

            <div class="col-lg-4">
              <div class="card card-detail card-right">
                <h2>Members are Going</h2>
                <div class="members my-2">
                  <img src="{{url('frontend/images/member1.png')}}" class="member-image mr-2" />
                  <img src="{{url('frontend/images/member2.png')}}" class="member-image mr-2" />
                  <img src="{{url('frontend/images/member3.png')}}" class="member-image mr-2" />
                  <img src="{{url('frontend/images/member4.png')}}" class="member-image mr-2" />
                  <img src="{{url('frontend/images/member5.png')}}" class="member-image mr-2" />
                  <hr />
                  <h2>Trips Information</h2>
                  <table class="trip-information">
                    <tr>
                      <th width="50%">Date of Departure</th>
                      <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->departure_date)->format('F n,Y')}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Duration</th>
                      <td width="50%" class="text-right">{{$item->duration}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Type</th>
                      <td width="50%" class="text-right">{{$item->type}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Price</th>
                      <td width="50%" class="text-right">${{$item->price}},00 / Person</td>
                    </tr>
                  </table>
                </div>
                <div class="join-container">
                  @auth
                  
                <form action="{{route('checkout_process',$item->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-block btn-join-now  mt-3 py-2 ">
                Join Now
                
                </button>
                
                </form>

                  @endauth
                  @guest
                  <a
                    href="{{route('login')}}"
                    class="btn btn-block btn-join-now mt-3 py-2"
                    >Login or Register</a
                  >

                  @endguest
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@push('addon-zoom')
<link rel="stylesheet" href="{{url('frontend/libraries/xZoom-master/dist/xzoom.css')}}" />
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/xZoom-master/dist/xzoom.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        $(".xzoom, .xzoom-gallery").xzoom({
          zoomWidth: 500,
          title: false,
          tint: "#333",
          xofsset: 15
        });
      });
    </script>
@endpush