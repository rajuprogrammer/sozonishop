@extends('layouts.app')
@section('content')

@php
$blogpost = DB::table('posts')->get();
$category = DB::table('categories')->get();


$new_product = DB::table('products')->where('status',1)
              ->where('new_product',1)
              ->orderBy('id','desc')->limit(36)->get();


$special_offer = DB::table('products')->where('status',1)
              ->where('special_offer',1)
              ->orderBy('id','desc')->limit(5)->get();

$special_deals = DB::table('products')->where('status',1)
              ->where('special_deals',1)
              ->orderBy('id','desc')->limit(5)->get();


$hot_deals = DB::table('products')->where('status',1)
              ->where('hot_deals',1)
              ->orderBy('id','desc')->limit(5)->get();


$featured_product = DB::table('products')->where('status',1)
              ->where('featured_product',1)
              ->orderBy('id','desc')->limit(20)->get();


$best_seller = DB::table('products')->where('status',1)
              ->where('best_seller',1)
              ->orderBy('id','desc')->limit(20)->get();

$new_arriavls = DB::table('products')->where('status',1)
              ->where('newarivals_product',1)
              ->orderBy('id','desc')->limit(20)->get();

@endphp
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">        
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach($category as $cat)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $cat->category_name }}</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                  @php
                  $subcategory = DB::table('subcategories')->where('category_id',$cat->id)->get();
                   @endphp

                    <div class="row">
                       @foreach($subcategory as $row)
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled"> 
                            <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                        </ul>
                      </div>
                       @endforeach()
                    </div>
                  </li>
                </ul>
              </li>  
            @endforeach()              
            </ul>
          </nav>
        </div>
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
           @foreach($hot_deals as $row) 
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> <img src="{{ asset($row->image_one)}}" alt=""> </div>
                  @if($row->discount_price == NULL)                    
                  @else
                    <div class="sale-offer-tag"><span>
                  @php
                  $amount =$row->selling_price - $row->discount_price;
                  $discount = $amount/$row->selling_price * 100;
                  @endphp
                     - {{ intval($discount) }} %<br>
                    off</span></div>
                  @endif                
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">10</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                  <div class="rating rateit-small"></div>
                  @if($row->discount_price == NULL)
                     <div class="product-price"> <span class="price">৳ {{ $row->selling_price }} </span></div>
                  @else
                     <div class="product-price"> <span class="price">৳ {{ $row->discount_price }} </span> <span class="price-before-discount">৳ {{ $row->selling_price }}</span> </div>
                  @endif
                </div>               
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                     <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>

                     <!--  <button class="btn btn-primary icon addwishlist" data-toggle="dropdown" type="button" data-id="{{ $row->id }}"> <i class="fa fa-shopping-cart"></i> </button> -->

                      <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary cart-btn" type="button" data-target="#cartmodal" onclick="productview(this.id);">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">SPECIAL OFFER</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              @foreach($special_offer as $row)      
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> <img src="{{ asset($row->image_one)}}" alt=""> </a> </div>                          
                          </div>
                        </div>
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">৳ {{ $row->selling_price }} </span> </div>                 
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> <img src="{{ asset($row->image_two)}}" alt=""> </a> </div>                            
                         </div>
                        </div>
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">৳ {{ $row->selling_price }}  </span> </div>                           
                          </div>
                        </div>
                      </div>
                    </div>                   
                  </div>             
                </div>
              </div>
              @endforeach 
            </div>
          </div>
        </div>
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            @foreach($special_deals as $row)
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> <img src="{{ asset($row->image_one)}}"  alt=""> </a> </div>                  
                          </div>
                        </div>
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">৳ {{ $row->selling_price }} </span> </div>                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach  
            </div>
          </div> 
        </div> 
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
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


<!-- Developer start -->
        @php
        $developer = DB::table('developers')->get();
        @endphp

        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            @foreach($developer as $row)
            <div class="item">
              <div class="avatar"><img src="{{ asset($row->images)}}" alt="Image"></div>
              <div class="testimonials"><em>"</em>{{ $row->details }}<em>"</em></div>
              <div class="clients_author">{{ $row->name }} <span>{{ $row->position }}</span> </div>
            </div>  
            @endforeach
          </div>
        </div>

<!-- end developer -->

        
        <div class="home-banner"><a href="{{ asset('public/frontend/images/apps/sozonishop.apk')}}"><img src="{{ asset('public/frontend/images/apps/app.jpg')}}" alt="Image"> </a> </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        @php
          $slider = DB::table('products')
            ->join('brands','products.brand_id','brands.id')->select('products.*','brands.brand_name')
            ->where('products.main_slider',1)->limit(4)->get();
        @endphp
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">          
        @foreach ($slider as $product)
            <div class="item" style="background-image: url({{ asset($product->image_one) }});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{ $product->brand_name }}</div>
                  <div class="big-text fadeInDown-1"> {{ $product->product_name }} </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $product->product_name }}</span> </div>
                  @if($product->discount_price == NULL)
                  <h2>৳{{ $product->selling_price }}</h2>
                  @else
                  <span><del>৳{{ $product->selling_price }}</del></span>৳{{ $product->discount_price }}
                  @endif
                  <div class="button-holder fadeInDown-3"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_name) }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
              </div>
            </div>
        @endforeach
          </div>
        </div>
<!-- Main slider end here -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over ৳99</h6>
                </div>
              </div>
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra ৳ 5 off on all items </h6>
                </div>
              </div>
            </div>
          </div>    
        </div>
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->


        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>              
              <li><a data-transition-type="backSlide" href="#clothings" data-toggle="tab">Clothing</a></li>             
              <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#watch" data-toggle="tab">Watch</a></li> 
            </ul>
          </div>

          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                @foreach($new_product as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img  src="{{ asset($row->image_one)}}" alt=""></a> </div>
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if($row->discount_price == NULL)
                            <div class="product-price"> <span class="price">৳ {{ $row->selling_price }} </span> </div>
                          @else
                            <div class="product-price"> <span class="price"> ৳{{ $row->discount_price }} </span> <span class="price-before-discount">৳ {{ $row->selling_price }}</span> </div>
                          @endif       
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                              <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $row->id }}"> <i class="fa fa-heart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>                      
                    </div>
                  </div> 
                @endforeach  
                </div>
              </div>
            </div>

@php

$cats = DB::table('categories')->skip(1)->first();
$category_id = $cats->id;
$products = DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();
@endphp
            
            <div class="tab-pane" id="clothings">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                @foreach($products as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img  src="{{ asset($row->image_one)}}" alt=""></a> </div>  
                          <div class="tag new"><span>new</span></div>
                        </div>               
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if($row->discount_price == NULL)
                          <div class="product-price"> <span class="price">৳ {{ $row->selling_price }}</div>
                          @else
                          <div class="product-price"> <span class="price">৳ {{ $row->discount_price }} </span> <span class="price-before-discount">৳ {{ $row->selling_price }}</span> </div>
                          @endif                         
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $row->id }}"> <i class="fa fa-heart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              @endforeach   
                </div>
              </div>
            </div>


@php

$cats = DB::table('categories')->skip(5)->first();
$category_id = $cats->id;
$products = DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();


@endphp
            
            <div class="tab-pane" id="laptop">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
@foreach($products as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img  src="{{ asset($row->image_one)}}" alt=""></a> </div>
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if($row->discount_price == NULL)
                          <div class="product-price"> <span class="price">৳ {{ $row->selling_price }}</div>
                          @else
                          <div class="product-price"> <span class="price">৳ {{ $row->discount_price }} </span> <span class="price-before-discount">৳ {{ $row->selling_price }}</span> </div>
                          @endif
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>

                                <!-- <button class="btn btn-primary icon addcart" data-toggle="dropdown" type="button" data-id="{{ $row->id }}"> <i class="fa fa-shopping-cart"></i> </button> -->

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $row->id }}"> <i class="fa fa-heart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                              </li>

                              <!-- <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> -->
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endforeach                  

                </div>
              </div>
            </div>


@php

$cats = DB::table('categories')->skip(3)->first();
$category_id = $cats->id;
$products = DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();


@endphp            
            <div class="tab-pane" id="watch">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

@foreach($products as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img  src="{{ asset($row->image_one)}}" alt=""></a> </div>
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          @if($row->discount_price == NULL)
                          <div class="product-price"> <span class="price">৳ {{ $row->selling_price }}</div>
                          @else
                          <div class="product-price"> <span class="price">৳ {{ $row->discount_price }} </span> <span class="price-before-discount">৳ {{ $row->selling_price }}</span> </div>
                          @endif                         
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>

                                <!-- <button class="btn btn-primary icon addcart" data-toggle="dropdown" type="button" data-id="{{ $row->id }}"> <i class="fa fa-shopping-cart"></i> </button> -->

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $row->id }}"> <i class="fa fa-heart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                              </li>

                              <!-- <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> -->
                            </ul>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>
@endforeach     
                </div>
              </div>
            </div>  
          </div>
        </div>



        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('public/frontend/images/banners/home-banner1.jpg')}}" alt=""> </div>
              </div>
            </div>
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('public/frontend/images/banners/home-banner2.jpg')}}" alt=""> </div>
              </div>
            </div>
          </div>
        </div>



<section class="section featured-product wow fadeInUp">
<h3 class="section-title">Featured products</h3>
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

    @foreach($featured_product as $row)

    <div class="item item-carousel">
        <div class="products">
          <div class="product">
            <div class="product-image">
              <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img  src="{{ asset($row->image_one)}}" alt=""></a> </div>
              @if($row->discount_price == NULL)
                <div class="tag new"><span>New</span></div>
              @else
                <div class="tag hot"><span>hot</span></div>
              @endif
            </div>                 
                  
            <div class="product-info text-left">
                <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>
                @if($row->discount_price == NULL)
                  <div class="product-price"><span class="price">
                    ৳ {{ $row->selling_price }} 
                  </span> </div>
                @else
                  <div class="product-price"> <span class="price"> ৳ {{ $row->discount_price }}  </span> <span class="price-before-discount">৳ {{ $row->selling_price }} </span> </div>
                @endif
                    
            </div>         
            <div class="cart clearfix animate-effect">
                <div class="action">
                  <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">

                      <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </li>

                    <li class="add-cart-button btn-group">
                      <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $row->id }}"> <i class="fa fa-heart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                    </li>
                  </ul>
                </div>                 
            </div> 
          </div>               
        </div>       
    </div> 
  @endforeach
  </div>         
</section>

        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('public/frontend/images/banners/home-banner.jpg')}}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
<div class="best-deal wow fadeInUp outer-bottom-xs">
  <h3 class="section-title">Best seller</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">

      @foreach($best_seller as $row)

      <div class="item">
        <div class="products best-product">
          <div class="product">
            <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> <img src="{{ asset($row->image_one)}}" alt=""> </a> </div>                                 
                    </div>
                  </div>
                  <div class="col2 col-xs-7">
                    <div class="product-info">
                        <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> {{ $row->product_name }}</a></h3>
                        <div class="rating rateit-small"></div>

                        @if($row->discount_price == NULL)
                          <div class="product-price"> <span class="price">৳ {{ $row->selling_price }} </span> </div>
                        @else
                        <div class="product-price"> <span class="price"> ৳ {{ $row->discount_price }}  </span> <span class="price-before-discount">৳ {{ $row->selling_price }} </span> </div>

                        @endif    
                                  
                      </div>
                  </div>
                </div> 
            </div>            
          </div>
          <div class="product">
            <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> <img src="{{ asset($row->image_two)}}" alt=""> </a> </div>                                 
                    </div>
                  </div>
                  <div class="col2 col-xs-7">
                    <div class="product-info">
                        <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"> {{ $row->product_name }}</a></h3>
                        <div class="rating rateit-small"></div>

                        @if($row->discount_price == NULL)
                          <div class="product-price"> <span class="price">৳ {{ $row->selling_price }} </span> </div>
                        @else
                        <div class="product-price"> <span class="price"> ৳ {{ $row->discount_price }}  </span> <span class="price-before-discount">৳ {{ $row->selling_price }} </span> </div>

                        @endif    
                                  
                      </div>
                  </div>
                </div> 
            </div>                                       
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>

        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">

@foreach($blogpost as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset($blog->post_image)}}" alt=""></a> </div>
                  </div>
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">{{ $blog->post_title_en }}</a></h3>
                    <span class="info">By Sozoni Shop &nbsp;|&nbsp; {{ $blog->created_at }}</span>
                    <p class="text">{!! $blog->details_en !!}</p>
                    <a href="{{ url('post/details/'.$blog->id) }}" class="lnk btn btn-primary">Read more</a> </div>  
                </div>
              </div>         
@endforeach              
            </div>
          </div>
        </section>
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->





<section class="section wow fadeInUp new-arriavls">
  <h3 class="section-title">New Arrivals</h3>
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

    @foreach($new_arriavls as $row)

    <div class="item item-carousel">
      <div class="products">
          <div class="product">
            <div class="product-image">
              <div class="image"> <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img  src="{{ asset($row->image_one)}}" alt=""></a> </div>
              @if($row->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
              @else
                <div class="tag" style="background-color: red;color:#fff"><span>
                  @php
                  $amount = $row->selling_price - $row->discount_price;
                  $discount = $amount/$row->selling_price * 100;
                  @endphp
                  - {{ intval($discount) }} %
                
              </span></div>
              @endif
            </div>     
            <div class="product-info text-left">
                <h3 class="name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>
                @if($row->discount_price == NULL)
                  <div class="product-price"><span class="price">
                    ৳ {{ $row->selling_price }} 
                  </span> </div>
                @else
                  <div class="product-price"> <span class="price"> ৳ {{ $row->discount_price }}  </span> <span class="price-before-discount">৳ {{ $row->selling_price }} </span> </div>
                @endif      
            </div>
            <div class="cart clearfix animate-effect">
                <div class="action">
                  <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">

                      <button id="{{ $row->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </li>
                    
                    <li class="add-cart-button btn-group">
                      <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $row->id }}"> <i class="fa fa-heart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                    </li>
                  </ul>
                </div>
            </div>
          </div>        
      </div>
    </div>          
   @endforeach
  </div>
</section>







        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>






    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

@php
$brand = DB::table('brands')->get();
@endphp
          @foreach($brand as $row)

          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{ asset($row->brand_logo)}}" src="{{ asset($row->brand_logo)}}" alt="" width="80px" height="60px"> </a> </div>
         @endforeach
        </div>
      </div>
    </div>
  </div>
</div>














<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>






<!-- 
<script type="text/javascript">
      $(document).ready(function() {
            $('.addcart').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/to/cart/') }}/"+id,
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

</script> -->

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



@endsection