@extends('layouts.app')
@section('content')
<style>
    /* .user_dasborad{
        width: 90%;
        height: auto;
        margin: 20px;
        padding: 20px;
    }
    .card{
        background: #fff;
    }
    .user_profile{
        margin-top: 70px;
        margin-bottom: 30px;
        padding: 20px;
    }
    .card_work{
        padding: 15px;
    } */
    .d-flex.flex-column.align-items-start {
    margin: 20px;
    padding: 20px;
}

    .card{
        background: #fff;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    table{
        margin-top: 30px;
        margin-bottom: 30px;
        overflow: hidden;
    }

</style>

@php
$order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp

<div class="container">
    <div class="row justify-content-center user_profile">
        <div class="col-md-8">
        @foreach($order as $row)    
          <div class="card flex-md-row mb-4 box-shadow h-md-250 m-4">
            <div class="card-body d-flex flex-column align-items-start" id="heading">
              <strong class="d-inline-block mb-2 text-primary">Order id : {{ $row->order_id }}</strong><br>
              <strong class="d-inline-block mb-2 text-primary">Payment id : {{ $row->payment_id }}</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Your Bkash Number : {{ $row->payment_method }}</a>
              </h3>
              <div class="mb-1 text-muted">Order Date : {{ $row->date }}</div>
              <p class="card-text mb-auto">Transection ID : {{ $row->blnc_transection }}</p>
              <p class="card-text mb-auto">Payment Type : {{ $row->payment_type }}</p>
              <p class="card-text mb-auto">Payning Amount : {{ $row->payning_amount }} Taka</p>
              <p class="card-text mb-auto">Subtotal : {{ $row->subtotal }} Taka</p>
              <p class="card-text mb-auto">Shipping Charge : {{ $row->shipping }} Taka</p>
              <p class="card-text mb-auto">Total Amount : {{ $row->total }} Taka</p>
              <p class="card-text mb-auto">Status Code : {{ $row->status_code }}</p>
              @if($row->status ==0)
              <p class="card-text mb-auto">Status : Pending</p>
              @elseif($row->status ==1)
              <p class="card-text mb-auto">Status : Payment Accept</p>
              @elseif($row->status ==2)
              <p class="card-text mb-auto">Status : Delivery Process</p>
              @elseif($row->status ==3)
              <p class="card-text mb-auto">Status : Delivered</p>
              @else
              <p class="card-text mb-auto">Status : Deliverey Done</p>
              @endif
            </div>
             @endforeach

        @foreach($details as $row)    
          <div class="card flex-md-row mb-4 box-shadow h-md-250 m-4">
            <div class="card-body d-flex flex-column align-items-start" id="heading1">
              <strong class="d-inline-block mb-2 text-primary">Product Name : {{ $row->product_name }}</strong>
              <div class="mb-1 text-muted">Color : {{ $row->color }}</div>
              <p class="card-text mb-auto">Size : {{ $row->size }}</p>
              <p class="card-text mb-auto">Quantity : {{ $row->quantity }}</p>
              <p class="card-text mb-auto">Single Price : {{ $row->singleprice }} Taka</p>
              <p class="card-text mb-auto">Total Price : {{ $row->totalprice }} Taka</p>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ asset($row->image_one) }}" data-holder-rendered="true" id="img">
               <button class="btn btn-primary btn-lg" onclick="pdf()">Download PDF</button>
          </div>
        @endforeach             
          </div>
        </div>


        <div class="col-md-3">
            <div class="card card_work" style="width: 24rem;">
                <div class="card-header">
                    <img src="{{ asset('public/frontend/images/avatar.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                    </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('home') }}"> My Profile</a></li>
                    <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                    <li class="list-group-item"><a href="#"> Edit Profile </a></li>
                    <li class="list-group-item"><a href="{{ route('success.orderlist') }}"> Return Order </a></li>
               
                 </ul>

                 <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function pdf(){
        var doc = new jsPDF()
        var h1 = document.querySelector('#heading');
        var h2 = document.querySelector('#heading1');
        doc.fromHTML(h1,10,10);
        doc.fromHTML(h2,130,10);
        doc.save('output.pdf');
    }
</script>

@endsection
