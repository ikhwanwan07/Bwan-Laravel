@extends('layouts.checkout')
@section('tittle','Checkout')
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
                  <li class="breadcrumb-item ">
                    Detail
                  </li>
                  <li class="breadcrumb-item active">
                    Checkout
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-detail">
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <h1>Who is Going</h1>
                <p>Trip to {{$item->travel_package->title}} ,{{$item->travel_package->location}}</p>
                <div class="attendee">
                  <table class="table table-responsive-sm">
                    <thead>
                      <tr>
                        <td>Picture</td>
                        <td>Name</td>
                        <td>Nationality</td>
                        <td>Visa</td>
                        <td>Passport</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>

                     @forelse ($item->details as $detail)
                     <tr>
                        <td><img src="https://ui-avatars.com/api/?name={{$detail->username}}" width="60" class="rounded-circle" /></td>
                        <td class="align-middle">{{$detail->username}}</td>
                        <td class="align-middle">{{$detail->nationality}}</td>
                        <td class="align-middle">{{$detail->is_visa ? '30 days' : 'N/A'}}</td>
                        <td class="align-middle">{{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'inActive'}}</td>
                        <td class="align-middle">
                          <a href="{{ route('checkout-remove', $detail->id)}}">
                            <img src="{{url('frontend/images/ic_remove.png')}}" alt="" />
                          </a>
                        </td>
                      </tr>
                     @empty
                     <tr>
                     <td colspan="6">NO visitor</td>
                     
                     </tr>


                     @endforelse
                      
                    </tbody>
                  </table>
                </div>
                <div class="member mt-3">
                  <h2>Add member</h2>
                  <form class="form-inline" action="{{route('checkout-create',$item->id)}}" method="post">
                  @csrf
                    <label for="username" class="sr-only">Name</label>
                    <input
                      type="text"
                      name="username"
                      class="form-control mb-2 mr-sm-2"
                      style="width:150px"
                      id="username"
                      placeholder="username"
                    />
                    <label for="nationality" class="sr-only">Nationality</label>
                    <input
                      type="text"
                      name="nationality"
                      class="form-control mb-2 mr-sm-2"
                      style="width:50px"
                      id="nationality"
                      placeholder="nationality"
                    />
                    <label for="is_visa" class="sr-only">Visa</label>
                    <select
                      name="is_visa"
                      id="is_visa"
                      class="form-control custom-select mb-2 mr-sm-2"
                    >
                      <option value="" selected>Visa</option>
                      <option value="1">30 Days</option>
                      <option value="0">N/A</option>
                    </select>
                    <label for="doePasport" class="sr-only">DOE Passport</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <input
                        type="text"
                        name="doe_passport"
                        class="form-control datepicker"
                        id="passport"
                        placeholder="Doe passport"
                      />
                    </div>
                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                      Add Now
                    </button>
                  </form>
                  <h3 class="mt-2 mb-0">Note</h3>
                  <p class=" disclaimer mb-0">
                    You are only able to invite member that has registered in
                    Nomads.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-detail card-right">
                <h2>Checkout Information</h2>
                <div class="members my-2">
                  <table class="trip-information">
                    <tr>
                      <th width="50%">Members</th>
                      <td width="50%" class="text-right">{{$item->details->count()}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Additional visa</th>
                      <td width="50%" class="text-right">{{$item->additional_visa}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Trip Price</th>
                      <td width="50%" class="text-right">${{$item->travel_package->price}}</td>
                    </tr>
                    <tr>
                      <th width="50%">sub total</th>
                      <td width="50%" class="text-right">${{$item->transaction_total}}</td>
                    </tr>
                    <tr>
                      <th width="50%">total (uniqecode)</th>
                      <td width="50%" class="text-right">
                        <span class="text-blue">${{$item->transaction_total}}</span>
                        <span class="text-orange">,{{mt_rand(0,99)}}</span>
                      </td>
                    </tr>
                  </table>

                  <hr />
                  <h2>Payment instruction</h2>
                  <p class="payment-instruction">
                    Please complete your payment before to continue the
                    wonderful trip
                  </p>
                  <div class="bank">
                    <div class="bank-item pb-3">
                      <img src="{{url('frontend/images/ic_bank.png')}}" class="bank-image" />
                      <div class="deskripsi">
                        <h3>PT Bank Beny</h3>
                        <p>
                          0881 8829 8800
                          <br />
                          Bank Central Asia
                        </p>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="bank-item pb-3">
                      <img src="{{url('frontend/images/ic_bank.png')}}" class="bank-image" />
                      <div class="deskripsi">
                        <h3>PT Bank Ikhwan</h3>
                        <p>
                          0991 9929 9900
                          <br />
                          Bank Mandiri
                        </p>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
                <div class="join-container">
                  <a
                    href="{{route('checkout-success', $item->id)}}"
                    class="btn btn-block btn-join-now mt-3 py-2"
                    >I Have Made Payment</a
                  >
                </div>
                <div class="text-center mt-3">
                  <a href="{{route('detail',$item->travel_package->slug)}}" class="text-muted">Cancel Booking</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


@endsection

@push('addon-zoom')
<link rel="stylesheet" href="{{url('frontend/libraries/combined/css/gijgo.css')}}" />
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/combined/js/gijgo.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        $(".datepicker").datepicker({
          format : 'yyyy-mm-dd',
          uiLibrary: "bootstrap4",
          icons: {
            rightIcon: '<img src="{{url('frontend/images/ic_doe.png')}}" alt="" />'
          }
        });
      });
    </script>
@endpush