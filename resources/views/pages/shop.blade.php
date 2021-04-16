@extends('layouts.app')
@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>All Products</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->

@php

$cats = DB::table('categories')->get();
$brands = DB::table('brands')->limit(10)->get();
@endphp



<div class="body-content outer-top-xs">
   <div class='container'>
      <div class='row'>

      	 <div class='col-md-3'>
            <!-- ========================================== SECTION – HERO ========================================= -->
            <div class="search-result-container ">
               <div id="myTabContent" class="tab-content category-list">
                  <div class="tab-pane active " id="grid-container">
                     <div class="category-product">
                        <div class="row">

                        
                              <div class="#">
                              	<strong>Category</strong>
                              	 @foreach($cats as $row) 
                                 <div class="#">
                                 	  
                                    <input type="checkbox">  <label>{{ $row->category_name }}</label>
                                   
                                 </div>
                                  @endforeach  
                              </div>


                              <div class="#">
                              	<strong>Brands</strong>
                              	 @foreach($brands as $row) 
                                 <div class="#">
                                 	  
                                    <input type="checkbox">  <label>{{ $row->brand_name }}</label>
                                   
                                 </div>
                                  @endforeach  
                              </div>

                        


                           
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.category-product -->
                  </div>


               </div>

            </div>
            <!-- /.search-result-container -->
         </div>

         <!-- /.sidebar -->
         <div class='col-md-9'>
            <!-- ========================================== SECTION – HERO ========================================= -->
            <div class="search-result-container ">
               <div id="myTabContent" class="tab-content category-list">
                  <div class="tab-pane active " id="grid-container">
                     <div class="category-product">
                        <div class="row">

                        @foreach($products as $pro)    
                           <div class="col-sm-6 col-md-4 wow fadeInUp">
                              <div class="products">
                                 <div class="product">
                                    <div class="product-image">
                                       <div class="image"><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}"><img src="{{ asset($pro->image_one) }}" alt=""></a></div>
                                       <!-- /.image -->
                                       @if($pro->discount_price==NULL)
                                       <div class="tag new"><span>new</span></div>
                                       @else
                                       @php
                                       $amount = $pro->selling_price - $pro->discount_price;
                                       $discount = $amount/$pro->selling_price * 100;
                                       @endphp
                                        <div class="tag new" style="background: red;"><span>-{{ intval($discount) }}%</span></div>
                                        @endif
                                    </div>
                                    <!-- /.product-image -->
                                    <div class="product-info text-left">
                                       <h3 class="name"><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}">{{ $pro->product_name }}</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="description"></div>
                                       @if($pro->discount_price == NULL)
                                       <div class="product-price"><span class="price">৳ {{ $pro->selling_price }}</span></div>
                                       @else
                                       <div class="product-price"><span class="price">৳ {{ $pro->discount_price }} </span> <span class="price-before-discount">৳ {{ $pro->selling_price }}</span></div>
                                       @endif
                                       <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <!-- /.cart -->
                                 </div>
                                 <!-- /.product -->
                              </div>
                              <!-- /.products -->
                           </div>
                           <!-- /.item -->

                        @endforeach   


                           
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.category-product -->
                  </div>


               </div>

            </div>
            <!-- /.search-result-container -->
         </div>
         <!-- /.col -->
      </div>
   </div>
   <!-- /.container -->
   <br>
</div>
<!-- /.body-content -->

<!--product cart add modal-->


@endsection