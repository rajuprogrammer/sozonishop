@extends('layouts.app')
@section('content')
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.qty{
   width: 50px;
   height: 28px;
   text-align: center;
}
table th {
   border-right-color: #fff;
}

.product-edit{
   height: 40px;
   margin-left: 10px;
}

.inc{
   font-size: 18px;
   width: 20px;
   
}
.incup{
   margin-left: 5px;
}
.card{
   background: #fff;
}
.list-group-item{
   border: none;
   background: #fff;
   /* margin-left: 20px; */
   padding: 10px;
   font-size: 20px;
}
</style>

@php

$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;

@endphp

<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Shopping Cart</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
   <div class="container">
      <div class="row ">
         <div class="shopping-cart">
            <div class="shopping-cart-table ">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th class="cart-romove item">Remove</th>
                           <th class="cart-description item">Image</th>
                           <th class="cart-product-name item">Product Name</th>
                           <th class="cart-qty item">Quantity</th>
                           <th class="cart-sub-total item">Price</th>
                           <th class="cart-total last-item">Total</th>
                        </tr>
                     </thead>
                     <!-- /thead -->
                     <tfoot>
                        <tr>
                           <td colspan="7">
                              <div class="shopping-cart-btn">
                                 <span class="">
                                 <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                 <!-- <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs" id="raju">Update shopping cart</a> -->

                                 </span>
                              </div>
                              <!-- /.shopping-cart-btn -->
                           </td>
                        </tr>
                     </tfoot>
                     <tbody>
       @foreach($cart as $row)                 
                        <tr>
                           <td class="romove-item"><a href="{{ url('remove/cart/'.$row->rowId) }}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                           <td class="cart-image">
                              <a class="entry-thumbnail" href="#">
                              <img src="{{ asset($row->options->image) }}" alt="">
                              </a>
                           </td>

                           <td class="cart-product-name-info">
                              <h4 class='cart-product-description'><a href="#">{{ $row->name }}</a></h4>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- <div class="rating rateit-small"></div> -->
                                 </div>
                                 <div class="col-sm-8">
                                   <!--  <div class="reviews">
                                       (06 Reviews)
                                    </div> -->
                                 </div>
                              </div>
                              <!-- /.row -->
                              @if($row->options->color==NULL)
                              @else
                              <div class="cart-product-info">
                                 <span class="product-color">COLOR:<span>
                                    {{ $row->options->color }}
                                 </span></span>
                              </div>
                              @endif
                              @if($row->options->size==NULL)
                              @else
                              <div class="cart-product-info">
                                 <span class="product-color">Size:<span>
                                    {{ $row->options->size }}
                                 </span></span>
                              </div>
                              @endif
                           </td>


                            <form action="{{ route('update.cartitem') }}" method="post">  
                           @csrf
                           <td class="">
                              <button class="qtyminus btn btn-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">&minus;</button>
                              <input class="qty" type="number" name="qty" id="qty" min="1" max="10" value="{{ $row->qty }}" onKeyDown="return false">
                              <button class="qtyplus btn btn-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">&plus;</button>
                              <input type="hidden" name="productid" value="{{ $row->rowId }}"> 



                              <!-- <button class="inc" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                              <input min="1" name="qty" value="{{ $row->qty }}" type="number">
                              <button class="inc" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button> -->
                              
                              <!-- 
                              <a href="#" class="product-edit btn btn-warning">Update</a> -->
                              <!-- <input type="hidden" name="productid" value="{{ $row->rowId }}">

                              <button type="submit" class="btn btn-primary incup">Update</button> -->
                           </td>

                           </form>

                           <!-- <td class="cart-product-quantity">
                              <input type="number" value="1">
                              <a href="#" class="product-edit btn btn-warning">Update</a>
                           </td> -->




                           <td class="cart-product-sub-total"><span class="cart-sub-total-price">৳{{ $row->price }}</span></td>
                           <td class="cart-product-grand-total"><span class="cart-grand-total-price">৳{{ $row->price * $row->qty }}</span></td>
                        </tr>
               @endforeach         

                     </tbody>
                     <!-- /tbody -->
                  </table>
                  <!-- /table -->
               </div>
            </div>
            <!-- /.shopping-cart-table -->            
            <!-- /.estimate-ship-tax -->
            <div class="col-md-8 col-sm-12 estimate-ship-tax">
               <table class="table">
                  <thead>
                     <tr>
                        <th>
                           <span class="estimate-title">Discount Code</span>
                           <p>Enter your coupon code if you have one..</p>
                        </th>
                     </tr>
                  </thead>
                  <tbody>

                     @if(Session::has('cupon'))
                     @else
                     <tr>
                        <td>

                         <form action="{{ route('apply.coupon') }}" method="post">  

                           @csrf
                           <div class="form-group">
                              <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." name="cupon">
                           </div>

                           <div class="clearfix pull-right">
                              <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                           </div>

                        </form>

                        </td>
                     </tr>

                     @endif


                  </tbody>
                  <!-- /tbody -->
               </table>
               <!-- /table -->
            </div>
            <!-- /.estimate-ship-tax -->






            <div class="col-md-4 col-sm-12 cart-shopping-total">

               <div class="card" style="width: 100%;">
                 <ul class="list-group list-group-flush">
                  @if(Session::has('cupon'))
                     <li class="list-group-item">Subtotal :  <span class="" style="float: right;">৳ {{ Session::get('cupon')['blance'] }}</span></li>
                     <li class="list-group-item">Coupon <a href="{{ route('coupon.remove') }}"><i class="fa fa-trash-o" style="color: red;"></i></a>  <span class="" style="float: right;">{{ Session::get('cupon')['name'] }} {{ Session::get('cupon')['discount'] }} ৳</span></li>
                  @else
                     <li class="list-group-item">Subtotal : <span id="subtotal" class="" style="float: right;">৳ {{ Cart::Subtotal() }}</span></li>
                  @endif


                <!--  <li class="list-group-item" name="shiping_charge">Shipping Charge : <span class="" style="float: right;" >৳ {{ $charge }}</span></li> -->

               @if(Cart::Subtotal()==0)
                <li class="list-group-item" name="shiping_charge">Shipping Charge : <span class="dhaka" id="dhaka" style="float: right;" >৳ 00</span></li>
               @else
               <li class="list-group-item" name="shiping_charge">Shipping Charge : <span class="dhaka" id="dhaka" style="float: right;" >৳ {{ $charge }}</span></li>
               @endif 
               

                  
                  @if(Session::has('cupon'))
                   <li class="list-group-item">Total  : <span id="totalprice" class="" style="float: right;">৳ {{ Session::get('cupon')['blance'] + $charge }}</span></li>
                   @elseif(Cart::Subtotal()==0)
                   <li class="list-group-item">Total  : <span id="totalprice" class="" style="float: right;">৳ 00</span></li>
                  @else       
                  <li class="list-group-item">Total  : <span id="totalprice" class="" style="float: right;">৳ {{ str_replace(',','',Cart::Subtotal())+ $charge }}</span></li>
                  @endif

                 </ul>
               </div>

               <table class="table text-left">
                 
                  <tbody>
                     <tr>
                        <td>

                           <div class="cart-checkout-btn pull-right">
                              <a href="{{ route('user.checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                           </div>
                        </td>
                     </tr>
                  </tbody>
                  <!-- /tbody -->
               </table>
               <!-- /table -->
            </div>
            <!-- /.cart-shopping-total -->  







         </div>
         <!-- /.shopping-cart -->
      </div>
<br><br>
   </div>
   <!-- /.container -->
</div>
<!-- /.body-content -->




@endsection