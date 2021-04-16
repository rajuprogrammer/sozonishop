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
        text-align: center;
        text-align: justify;
        padding: 50px;
	}
	.card-subtotl , .card-subtotl-1 , .card-subtotl-2 {
		/* border-bottom: 1px solid grey; */
		padding: 10px;
	}
	
	.sub_one , .shipping_two , .tot_three{
		margin-left: 20px;
        font-size: 20px;
		
	}
    .tot_three{
        color: green;
        font-weight: bold;
        text-transform: uppercase;
    }
    .tot_three_to{
        color: green;
        font-weight: bold;
    }
	.sub_one_tk , .shippinh_tk , .tot_three_to{
		float: right;
		margin-right: 20px;
        font-size: 20px;
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
    .sing_one{
        box-shadow: none;
    }

    .loging_one{
        box-shadow: none;
        margin-top: 20px;
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

               <!--  <div class="col-md-6 col-sm-6 sign-in">
                    <div class="loging_one">
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
                </div> -->
                <!-- Sign-in -->



                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">

                    <div class="sing_one card-body">
                        <h4 class="checkout-subtitle text-center">Shipping Information</h4>

                        <form class="register-form outer-top-xs" role="form" action="{{ route('payment.process') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Receiver Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name..." name="name" required="">

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" name="phone" value="" id="exampleInputEmail1" placeholder="Phone Numbar..." name="phone" required="">
                            </div>


                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email" value="" id="exampleInputEmail2" placeholder="Email Address.." name="email" required="">

                            </div>
                            
                            
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Address <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Address" name="address" required="">
                                
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">City <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="City" name="city" required="">
                                
                            </div>

                            <h4 class="checkout-subtitle text-center">Payment By</h4>
                            <div class="form-group">

                                <select name="payment" id="payment" class="form-control" onchange="selectedExcludedoption()">
                                    <option>--Select Payment Method--</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="Cash On Delivery">Cash On Delivery</option>
                                </select>                          
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Order Now</button>
                       

                    </div>
                </div>
                <!-- create a new account -->
                <div class="col-md-6 col-sm-6">
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
                            @if(Cart::Subtotal()==0)
                            <span class="shippinh_tk">৳ 00</span>
                            @else
                            <span class="shippinh_tk">৳ {{ $charge }} .00</span>
                            @endif
                        </div>

                        <div class="card-subtotl-2">
                            <span class="tot_three">Total :</span>
                            @if(Session::has('cupon'))
                            <span class="tot_three_to">৳ {{ Session::get('cupon')['blance'] + $charge }}</span>
                            @elseif(Cart::Subtotal()==0)
                            <span class="tot_three_to">৳ 00</span>
                            @else
                            <span class="tot_three_to">৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="shipping" value="{{ $charge }}"> 
                    <input type="hidden" name="vat" value="0"> 
                    <input type="hidden" name="total" value="{{ str_replace(',','',Cart::Subtotal())+ $charge }}">

                    <div class="loging_one">
                        <table class="table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quntity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                    @foreach($cart as $row)         
                    <tr>
                                    <td><img src="{{ asset($row->options->image) }}" alt="" width="45px" height="45px"></td>
                                    <td>{{ $row->name }}</td>                                  
                                    <td>{{ $row->options->color }}</td>
                                    <td>{{ $row->options->size }}</td>
                                    <td>{{ $row->qty }}</td>
                                    <td>৳ {{ $row->price }}</td>
                                    <td>৳ {{ $row->price * $row->qty }}</td>
                            
                    </tr>
                    @endforeach 

                            </tbody>
                        </table>
                    </div>
                    
                </div>

                 <div class="col-md-6 col-sm-6">

                 <div class="alert alert-success" role="alert" id="Bkash" style="display: none;">
                          @if(Session::has('cupon'))
                          <span class="alert-heading">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ Session::get('cupon')['blance'] + $charge }}</span>
                          @else
                          <span class="alert-heading">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</span>
                          @endif
                          <img src="{{ asset('public/frontend/images/payment/bkash.png') }}" alt="">
                          <span>You will get your product in two or three business days.</span>
                          <hr>
                          <span>bKash Personal Number : 01740210546</span>
                          <input type="text" placeholder="Your Bkash Number" class="form-control" name="bkash" style="background-color: #fff;">
                          <label for="">Transection ID</label>
                          <input type="text" placeholder="XXXXXXXXXX" class="form-control" name="bkash_transection" style="background-color: #fff;">
                        </div>

                        <div class="alert alert-success" role="alert" id="Rocket" style="display: none;">
                          @if(Session::has('cupon'))
                          <span class="alert-heading">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ Session::get('cupon')['blance'] + $charge }}</span>
                          @else
                          <span class="alert-heading">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</span>
                          @endif
                          <img src="{{ asset('public/frontend/images/payment/rocket.png') }}" alt="">
                          <span>You will get your product in two or three business days.</span>
                          <hr>
                          <span>rocket Personal Number : 01740210546</span>
                          <input type="text" placeholder="Your Rocket Number" class="form-control" name="rocket" style="background-color: #fff;">
                          <label for="">Transection ID</label>
                          <input type="text" placeholder="XXXXXXXXXX" class="form-control" name="rocket_transection" style="background-color: #fff;">
                        </div>

                        <div class="alert alert-success" role="alert" id="Nagad" style="display: none;">
                          @if(Session::has('cupon'))
                          <span class="alert-heading">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ Session::get('cupon')['blance'] + $charge }}</span>
                          @else
                          <span class="alert-heading">"SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</span>
                          @endif
                          <img src="{{ asset('public/frontend/images/payment/nagad.png') }}" alt="">
                          <span>You will get your product in two or three business days.</span>
                          <hr>
                          <span>Nagad Personal Number : 01740210546</span>
                          <input type="text" placeholder="Your Nagad Number" class="form-control" name="nagad" style="background-color: #fff;">
                          <label for="">Transection ID</label>
                          <input type="text" placeholder="XXXXXXXXXX" class="form-control" name="nagad_transection" style="background-color: #fff;">
                        </div>

                    </div>
 </form>
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






<script>
function selectedExcludedoption() {
   var selectedExcludeoption = $('#payment option:selected').text().trim();
   if (selectedExcludeoption == "Bkash") {
        $("#Bkash").show();
        $("#Rocket").hide();
        $("#Nagad").hide();
       
   }
   else if (selectedExcludeoption == "Rocket") {
        $("#Rocket").show();
        $("#Nagad").hide();
        $("#Bkash").hide();
       
   }
   else if (selectedExcludeoption == "Nagad") {
        $("#Nagad").show();
        $("#Rocket").hide();
        $("#Bkash").hide();
       
   }
   else {
       $("#Nagad").hide();
        $("#Rocket").hide();
        $("#Bkash").hide();
   }
}

</script>



@endsection