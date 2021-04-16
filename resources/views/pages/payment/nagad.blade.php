@extends('layouts.app')
@section('content')
@php

$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$cart=Cart::content();
@endphp
<style>

	.card_tk{
		background: #fff;
		/* box-shadow: 1px 1px 9px 0px rgba(50, 50, 50, 0.91); */
        padding: 50px;
	}
	.card-subtotl , .card-subtotl-1 , .card-subtotl-2 {
		/* border-bottom: 1px solid grey; */
		padding: 20px;
        font-size: 20px;
	}
    .tot_three , .tot_three_to{
        color: green;
        text-transform: uppercase;
        font-weight: bold;
    }
   
	
	.sub_one , .shipping_two , .tot_three{
		margin-left: 20px;
		
	}
	.sub_one_tk , .shippinh_tk , .tot_three_to{
		float: right;
		margin-right: 20px;
	}
	table th{
		border-top: none;
		border-right: none;
		border-bottom: none;
		text-align: center;
	}
	table td{
		border-right: none;
		text-align: center;
	}
    .logos_list li{
        display: inline-block;
    }
</style>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">

                   <!--  <div class="loging_one">
                        <table>
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Quntity</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                    @foreach($cart as $row)         
                    <tr>
                                    <td><img src="{{ asset($row->options->image) }}" alt="" width="45px" height="45px"></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->qty }}</td>
                                    <td>{{ $row->options->color }}</td>
                                    <td>{{ $row->options->size }}</td>
                                    <td>৳ {{ $row->price }}</td>
                                    <td>৳ {{ $row->price * $row->qty }}</td>
                            
                    </tr>
                    @endforeach 

                            </tbody>
                        </table>
                        
                    </div>
 -->

                    <div class="card-body card_tk" style=" margin-top: 30px;">                      
                  
                        <div class="card-subtotl">
                        @if(Session::has('cupon'))  
                            <span class="sub_one">Subtotla :</span>
                            <span class="sub_one_tk">৳ {{ Session::get('cupon')['blance'] }}</span>
                            @else
                            <span class="sub_one">Subtotla :</span>
                            <span class="sub_one_tk">৳ {{ Cart::Subtotal() }}</span>
                            @endif
                        </div>

                        <div class="card-subtotl-1">
                            <span class="shipping_two">Shipping Charge :</span>
                            <span class="shippinh_tk">৳ {{ $charge }} .00</span>
                        </div>

                        <div class="card-subtotl-2">
                            @if(Session::has('cupon'))
                            <span class="tot_three">Total :</span>
                            <span class="tot_three_to">৳ {{ Session::get('cupon')['blance'] + $charge }}</span>
                            @else
                            <span class="tot_three">Total :</span>
                            <span class="tot_three_to">৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</span>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- Sign-in -->



                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">

                    <div class="sing_one">
                        
                        <form class="register-form outer-top-xs" role="form" action="{{ route('nagad.charge') }}" method="post">
                            @csrf
                            


                            <h4 class="checkout-subtitle text-center">Payment By</h4>
                            <!-- <div class="form-group">
                                <ul class="logos_list">
                                    <li><input type="radio" name="payment" value="bkash" id="bkash"> <img src="{{ asset('public/frontend/images/bkash.png') }}" style="width: 100px; height: 60px;"></li>
                                 </ul>

                               
                            </div> -->


                            <div class="" id="bkash1">
                                <div class="jumbotron">
                                    @if(Session::has('cupon'))
                                    <p class="lead">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ Session::get('cupon')['blance'] + $charge }}</p>
                                    @else
                                    <p class="lead">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</p>
                                    @endif

                                    <div class="form-group">
                                <ul class="logos_list">
                                    <li> <img src="{{ asset('public/frontend/images/nagad.jpg') }}" style="width: 100px; height: 60px;"></li>
                                 </ul>

                               
                            </div>
                                    <hr class="my-4">
                                    <span>You will get your product in two or three business days.</span><br><br>

                                    <span>Nagad Personal Number : 01740210546</span><br><br>
                                    <input type="text" placeholder="Your Bkash Number" class="form-control" name="payment_method"><br>
                                    <label for="">Transection ID</label>
                                    <input type="text" placeholder="XXXXXXXXXX" class="form-control" name="blnc_transection"><br>
                                </div>
                       
                               <input type="hidden" name="shipping" value="{{ $charge }}"> 
                               <input type="hidden" name="vat" value="0"> 
                               <input type="hidden" name="total" value="{{ str_replace(',','',Cart::Subtotal())+ $charge }}">

                                <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                                <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                                <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                                <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                                <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                                <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

                         

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Pay Now</button>
                        </form>

                    </div>
                </div>
                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 sign-in">
                    
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<br><br>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /.body-content -->









@endsection