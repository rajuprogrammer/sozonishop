@extends('layouts.app')
@section('content')

     
<style>
   .quantity {
    display: flex;
    justify-content: center;
    height: 32px;
}

.quantity button {
    border: 1px solid #000;
    color: #000;
    border-radius: 0;
    background: #fff
}

.quantity input {
    border: none;
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
    text-align: center;
    width: 80px;
    font-size: 20px;
    color: #000;
    font-weight: 300;

}

</style>


<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">{{ $product->category_name }}</a></li>
            <li class='active'>{{ $product->product_name }}</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->


<div class="body-content outer-top-xs">
   <div class='container'>
      <div class='row single-product'>
<!--          <div class='col-md-3 sidebar'>
            <div class="sidebar-module-container">
               <div class="home-banner outer-top-n">
                  <img src="{{ asset($product->image_one) }}" alt="Image">
               </div>
               <div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
                  <h3 class="section-title">hot deals</h3>
                  <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
@php

$hot_deals = DB::table('products')->where('status',1)
              ->where('hot_deals',1)
              ->orderBy('id','desc')->limit(5)->get();
@endphp                     
@foreach($hot_deals as $row)
                     <div class="item">
                        <div class="products">
                           <div class="hot-deal-wrapper">
                              <div class="image">
                                 <img src="{{ asset($row->image_one)}}" alt="">
                              </div>
                              @if($row->discount_price == NULL) 
                              <div class="sale-offer-tag bg-primary"><span style="margin-top: 10px">New</span></div>
                              @else
                              @php
                              $amount =$row->selling_price - $row->discount_price;
                              $discount = $amount/$row->selling_price * 100;
                              @endphp

                              <div class="sale-offer-tag"><span>- {{ intval($discount) }} %<br>off</span></div>
                            @endif  
                              <div class="timing-wrapper">
                                 <div class="box-wrapper">
                                    <div class="date box">
                                       <span class="key">5</span>
                                       <span class="value">Days</span>
                                    </div>
                                 </div>
                                 <div class="box-wrapper">
                                    <div class="hour box">
                                       <span class="key">20</span>
                                       <span class="value">HRS</span>
                                    </div>
                                 </div>
                                 <div class="box-wrapper">
                                    <div class="minutes box">
                                       <span class="key">36</span>
                                       <span class="value">MINS</span>
                                    </div>
                                 </div>
                                 <div class="box-wrapper hidden-md">
                                    <div class="seconds box">
                                       <span class="key">60</span>
                                       <span class="value">SEC</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="product-info text-left m-t-20">
                              <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price">
                              @if($row->discount_price == NULL)<span class="price">৳ {{ $row->selling_price }} </span>
                              @else
                                 <span class="price">৳ {{ $row->discount_price }} </span> <span class="price-before-discount">৳ {{ $row->selling_price }} </span>			
                              @endif   		
                              </div>
                           </div>
                           <div class="cart clearfix animate-effect">
                               <form action="{{ url('cart/product/add/'.$row->id) }}" method="post">
                     @csrf
                              <div class="action">
                                 <div class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary cart-btn" type="button" data-target="#cartmodal" onclick="productview(this.id);">Add to cart</button>
                                 </div>
                              </div>
                           </form>
                           </div>
                        </div>
                     </div>
@endforeach
                  </div>
               </div>
               <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                  <h3 class="section-title">Newsletters</h3>
                  <div class="sidebar-widget-body outer-top-xs">
                     <p>Sign Up for Our Newsletter!</p>
                     <form action="{{ route('store.newslater') }}" method="post">
                        @csrf
                        <div class="form-group">
                           <label class="sr-only" for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter" name="email">
                        </div>
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
 -->








         <!-- /.sidebar -->
         <div class='col-md-12'>
            <div class="detail-block">
               <div class="row  wow fadeInUp">
                  <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                     <div class="product-item-holder size-big single-product-gallery small-gallery">
                        <div id="owl-single-product">

                           <div class="single-product-gallery-item" id="slide1">
                              <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product->image_one) }}">
                              <img class="img-responsive" alt="" src="{{ asset($product->image_one) }}" data-echo="{{ asset($product->image_one) }}" />
                              </a>
                           </div>
                           <!-- /.single-product-gallery-item -->
                           <div class="single-product-gallery-item" id="slide2">
                              <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product->image_two) }}">
                              <img class="img-responsive" alt="" src="{{ asset($product->image_two) }}" data-echo="{{ asset($product->image_two) }}" />
                              </a>
                           </div>
                           <!-- /.single-product-gallery-item -->
                           <div class="single-product-gallery-item" id="slide3">
                              <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product->image_three) }}">
                              <img class="img-responsive" alt="" src="{{ asset($product->image_three) }}" data-echo="{{ asset($product->image_three) }}" />
                              </a>
                           </div>



                        </div>


                        <!-- /.single-product-slider -->
                        <div class="single-product-gallery-thumbs gallery-thumbs">
                           <div id="owl-single-product-thumbnails">
                              <div class="item">
                                 <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                 <img class="img-responsive" width="85" alt="" src="{{ asset($product->image_one) }}" data-echo="{{ asset($product->image_one) }}" />
                                 </a>
                              </div>
                              <div class="item">
                                 <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                 <img class="img-responsive" width="85" alt="" src="{{ asset($product->image_two) }}" data-echo="{{ asset($product->image_two) }}"/>
                                 </a>
                              </div>
                              <div class="item">
                                 <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                 <img class="img-responsive" width="85" alt="" src="{{ asset($product->image_three) }}" data-echo="{{ asset($product->image_three) }}" />
                                 </a>
                              </div>

                             
                            
                             
                           </div>
                           <!-- /#owl-single-product-thumbnails -->
                        </div>
                        <!-- /.gallery-thumbs -->
                     </div>
                     <!-- /.single-product-gallery -->
                  </div>
                  <!-- /.gallery-holder -->        			
                  <div class='col-sm-6 col-md-7 product-info-block'>
                     <div class="product-info">
                        <span>{{ $product->category_name }} > {{ $product->brand_name }}</span>
                        <h1 class="name">{{ $product->product_name }}</h1>

                        <div class="rating-reviews m-t-20">
                           <div class="row">
                              <div class="col-sm-8">
                                <div class="review" style="color: red">
                                  <i class="fa fa-star rate"></i>
                                  <i class="fa fa-star rate"></i>
                                  <i class="fa fa-star rate"></i>
                                  <i class="fa fa-star rate"></i>
                                  <i class="fa fa-star non-rate"></i>
                                  <a href="#" class="lnk">(13 Reviews)</a>
                                 </div>
                                 <!-- <div class="rating rateit-small"></div> -->
                              </div>
                              <div class="col-sm-3">
                                 
                              </div>
                           </div>
                           <!-- /.row -->		
                        </div>
                        <!-- /.rating-reviews -->
                        <div class="stock-container info-container m-t-10">
                           <div class="row">
                              <div class="col-sm-2">
                                 <div class="stock-box">
                                    <span class="label">Availability:   </span>
                                 </div>
                              </div>
                              <div class="col-sm-9">
                                 <div class="stock-box">
                                    <span class="value">   {{ $product->product_quantity }} In Stock</span>
                                 </div>
                              </div>
                           </div>
                           <!-- /.row -->	
                        </div>
                        <!-- /.stock-container -->
                        <div class="description-container m-t-20">
                         {!! $product->product_details !!}
                        </div>
                        <!-- /.description-container -->
                        <div class="price-container info-container m-t-20">
                           <div class="row">
                              <div class="col-sm-6">

                                 @if($product->discount_price == NULL)
                                 <div class="price-box"> 
                                    <span class="price">৳ </span><span class="price" id="price">{{ $product->selling_price }}</span>
                                    <!-- <span class="price-strike">$900.00</span> -->
                                 </div>
                                 @else
                                 @endif
                                 @if($product->discount_price != NULL)
                                 <div class="price-box">
                                    <span class="price">৳ </span><span class="price" id="price">{{ $product->discount_price }}</span>
                                    <!-- <span class="price-strike">$900.00</span> -->
                                 </div>
                                 @else
                                 @endif
                              </div>
                              <div class="col-sm-6">
                                 <div class="favorite-button m-t-10">

                                    <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $product->id }}"> <i class="fa fa-heart"></i> </button>

                                  <!--   <a class="btn btn-primary addwishlist" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#" data-id="{{ $product->id }}">
                                    <i class="fa fa-heart"></i>
                                    </a> -->

                                 </div>
                              </div>
                           </div>
                           <!-- /.row -->
                        </div>
                        <!-- /.price-container -->



                  <form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
                     @csrf
                         <div class="quantity-container info-container">
                           <div class="row">

                            
                            @if($product->product_size == NULL)
                            @else
                             <div class="col-md-6">
                                 <select name="size" id="" class="form-control">
                              @foreach($product_size as $size)
                                   <option value="{{$size}}">{{$size}}</opotion>
                              @endforeach
                                 </select>
                              </div>
                            @endif

                               

                              <div class="col-md-6">
                                 <select name="color" id="" class="form-control">
                              @foreach($product_color as $color)
                                   <option value="{{$color}}">{{$color}}</opotion>
                              @endforeach
                                 </select>
                              </div>
                           
                           </div>
                           <!-- /.row -->
                        </div>


                        <div class="quantity-container info-container">
                           <div class="row">
                              <div class="col-sm-2">
                                 <span class="label">Qty :</span>
                              </div>


                              <div class="col-sm-3">
                                     <div class="quantity">
                                         <button class="btn minus-btn disabled" type="button">-</button>
                                         <input type="text" id="quantity" value="1" name="qty">
                                         <button class="btn plus-btn" type="button">+</button>
                                     </div>

                              </div>


                              <div class="col-sm-6">
                                 <button href="" class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                              </div>



                           </div>
                           <br>
                        <div class="sharethis-inline-share-buttons"></div>
                        </div>

                     </from>



                        <!-- /.quantity-container -->
                     </div>
                     <!-- /.product-info -->
                  </div>
                  <!-- /.col-sm-7 -->
               </div>
               <!-- /.row -->
            </div>
            <div class="product-tabs inner-bottom-xs  wow fadeInUp">
               <div class="row">
                  <div class="col-sm-3">
                     <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                        <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                        <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                        <li><a data-toggle="tab" href="#tags">Comments</a></li>
                     </ul>
                     <!-- /.nav-tabs #product-tabs -->
                  </div>
                  <div class="col-sm-9">
                     <div class="tab-content">
                        <div id="description" class="tab-pane in active">
                           <div class="product-tab">
                              <p class="text">{!! $product->product_description !!}</p>
                           </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div id="review" class="tab-pane">
                           <div class="product-tab">
                              <div class="product-reviews">
                                 <h4 class="title">Customer Reviews</h4>
                                 <div class="reviews">
                                    <div class="review">
                                       <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                       <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                    </div>
                                 </div>
                                 <!-- /.reviews -->
                              </div>
                              <!-- /.product-reviews -->
                              <div class="product-add-review">
                                 <h4 class="title">Write your own review</h4>
                                 <div class="review-table">
                                    <div class="table-responsive">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <th class="cell-label">&nbsp;</th>
                                                <th>1 star</th>
                                                <th>2 stars</th>
                                                <th>3 stars</th>
                                                <th>4 stars</th>
                                                <th>5 stars</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="cell-label">Quality</td>
                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                             </tr>
                                             <tr>
                                                <td class="cell-label">Price</td>
                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                             </tr>
                                             <tr>
                                                <td class="cell-label">Value</td>
                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- /.table .table-bordered -->
                                    </div>
                                    <!-- /.table-responsive -->
                                 </div>
                                 <!-- /.review-table -->
                                 <div class="review-form">
                                    <div class="form-container">
                                       <form role="form" class="cnt-form">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                   <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                   <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                   <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                   <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                </div>
                                                <!-- /.form-group -->
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                   <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                </div>
                                                <!-- /.form-group -->
                                             </div>
                                          </div>
                                          <!-- /.row -->
                                          <div class="action text-right">
                                             <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                          </div>
                                          <!-- /.action -->
                                       </form>
                                       <!-- /.cnt-form -->
                                    </div>
                                    <!-- /.form-container -->
                                 </div>
                                 <!-- /.review-form -->
                              </div>
                              <!-- /.product-add-review -->										
                           </div>
                           <!-- /.product-tab -->
                        </div>
                        <!-- /.tab-pane -->
                        <div id="tags" class="tab-pane">
                           <div class="product-tag">
                              <h4 class="title">Comments</h4>
                              <form role="form" class="form-inline form-cnt">
                                 <div class="form-container">
                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8" data-lazy="false"></div>
                                 </div>
                                 <!-- /.form-container -->
                              </form>
                              <!-- /.form-cnt -->
                              <form role="form" class="form-inline form-cnt">
                                 <div class="form-group">
                                    <label>&nbsp;</label>
                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                 </div>
                              </form>
                              <!-- /.form-cnt -->
                           </div>
                           <!-- /.product-tab -->
                        </div>
                        <!-- /.tab-pane -->
                     </div>
                     <!-- /.tab-content -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.product-tabs -->
            <!-- ============================================== UPSELL PRODUCTS ============================================== -->
          
            <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
         </div>
         <!-- /.col -->
         <div class="clearfix"></div>







      </div>
      <!-- /.row -->
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <br><br>
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
   </div>
   <!-- /.container -->
</div>
<!-- /.body-content -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script type="text/javascript">
      $(document).ready(function() {
            $('.addwishlist').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/wishlist/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })

                       if($.isEmptyObject(data.error)){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }

                     },
                    
                 });
             } else {
                 alert('danger');
             }
              e.preventDefault();
          });
     });

</script>


 <script>
        //setting default attribute to disabled of minus button
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

        //taking value to increment decrement input value
        var valueCount;

        //taking price value in variable
        var price = document.getElementById("price").innerText;

        //price calculation function
        function priceTotal() {
            var total = valueCount * price;
            document.getElementById("price").innerText = total;
        }

        //plus button
        document.querySelector(".plus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount++;

            //setting increment input value
            document.getElementById("quantity").value = valueCount;

            if (valueCount > 1) {
                document.querySelector(".minus-btn").removeAttribute("disabled");
                document.querySelector(".minus-btn").classList.remove("disabled")
            }

            //calling price function
            priceTotal()
        })

        //plus button
        document.querySelector(".minus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount--;

            //setting increment input value
            document.getElementById("quantity").value = valueCount

            if (valueCount == 1) {
                document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
            }

            //calling price function
            priceTotal()
        })
    </script>

    <script>
       $(document).ready(function(){
         $('.example1').BUP('example2', 0.5);

       });
    </script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>


<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6045851832910c0018e21804&product=inline-share-buttons" async="async"></script>

@endsection