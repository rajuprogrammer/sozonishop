<!DOCTYPE html>
<html lang="en">

<head>

<!-- Meta -->
<meta name="csrf" value="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="robots" content="">


  <!-- Twitter -->
<meta name="twitter:site" content="">
<meta name="twitter:creator" content="">
<meta name="twitter:card" content="">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="">

<!-- Facebook -->
<meta property="og:url" content="">
<meta property="og:title" content="">
<meta property="og:description" content="">

<meta property="og:image" content="">
<meta property="og:image:secure_url" content="">
<meta property="og:image:type" content="">
<meta property="og:image:width" content="">
<meta property="og:image:height" content="">

<!-- Meta -->
<meta name="description" content="">
<meta name="author" content="">





<title>Sozoni Shop</title>

<!-- Bootstrap Core CSS -->
<link rel="icon" href="{{ asset('public/frontend/images/fabicon.jpg') }}" type="image/gif" sizes="16x16">

<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('public/frontend/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/blue.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/rateit.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-select.min.css')}}">
<link href="{{ asset('public/frontend/css/lightbox.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/frontend/css/style.css')}}">

 <style>
     
 </style>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<style>
.go-top {
  position: fixed;
  bottom: 2em;
  right: 2em;
  text-decoration: none;
  color: white;
  background-color: rgba(0, 0, 0, 0.3);
  font-size: 12px;
  padding: 1em;
  display: none;
}

.go-top:hover {
  background-color: rgba(0, 0, 0, 0.6);
}
</style>



</head>
<body class="cnt-home">
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">

            @guest

            <li><a href="{{ route('user.wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="{{ route('show.cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="{{ route('user.checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
            @else
            @php
            $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
            @endphp
            <li><a href="{{ route('user.wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a>
              <span class="count">{{ count($wishlist) }}</span>
            </li>
            <li><a href="{{ route('show.cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="{{ route('user.checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
            @endguest

            @guest
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Register | Login</a></li>
            @else
            <li><a href="{{ route('home') }}"><i class="icon fa fa-user"></i>My Account</a></li>
            @endguest            
          </ul>
        </div>       
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li><a href="{{ url('show/tracking') }}" style="color: black;font-weight: 700;"><i class="icon fa fa-check"></i>My Order Tracking</a></li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">Language </span><b class="caret"></b></a>
              @php
                $language=session()->get('lang');
              @endphp
              <ul class="dropdown-menu">
                @if(session()->get('lang') =='bangla')
                  <li><a href="{{ route('language.english') }}">English</a></li>
                @else
                  <li><a href="{{ route('language.bangla') }}">Bangla</a></li>
                @endif
              </ul>
            </li>
          </ul> 
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('public/frontend/images/logo.png')}}" alt="logo" style="margin-top: -50px;"> </a> </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <div class="search-area">
            <form action="{{ route('product.search') }}" method="post">
              @csrf
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      @php
                        $category = DB::table('categories')->get();
                      @endphp

                      @foreach($category as $row)
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- {{ $row->category_name }}</a></li>
                      @endforeach()
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Search here..." name="search" type="search">
                <button type="submit" class="search-button"></button></div>
            </form>
          </div>
       </div>
      
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
@php

$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;

@endphp          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">{{ Cart::count() }}</span></div>
              
              @if(Session::has('cupon'))
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign" style="font-size: 8px">৳ </span><span class="value">{{ Session::get('cupon')['blance'] + $charge }}</span> </span> 
              </div>
              @else
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign" style="font-size: 8px">৳ </span><span class="value">{{ Cart::Subtotal() }}</span> </span> 
              </div>
              @endif

            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary">
@php
$cart_one = Cart::content();
@endphp
     
@foreach($cart_one as $row)
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="#"><img src="{{ asset($row->options->image) }}" alt="" width="50px;"></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index8a95.html?page-detail">{{ $row->name }}</a></h3>
                      <div class="price">{{ $row->qty }} * {{ $row->price }} ৳</div>
                    </div>
                    <div class="col-xs-1 action"> <a href="{{ url('remove/cart/'.$row->rowId) }}"><i class="fa fa-trash"></i></a> </div>
                  </div>
@endforeach              
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>৳ {{ Cart::Subtotal() }}</span> </div>
                  <div class="clearfix"></div>
                  <a href="{{ route('show.cart') }}" class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
                  <a href="{{ route('user.checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>               
              </li>
            </ul>
          </div>
          </div>
      </div>
    </div>  
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}">Home</a> </li>
                @php
                  $category_new = DB::table('categories')->orderBy('id','ASC')->limit(6)->get(); 
                @endphp
                @foreach($category_new as $cat)
                <li class="dropdown yamm mega-menu"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $cat->category_name }}</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                         @php
                         $subcategory = DB::table('subcategories')->where('category_id',$cat->id)->get();
                        @endphp
                        <div class="row">
                          @foreach($subcategory as $subcat)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <ul class="links">                          
                              <li><a href="{{ url('products/'.$subcat->id) }}">{{ $subcat->subcategory_name }}</a></li>                           
                            </ul>
                         </div> 
                          @endforeach                    
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach

                <li class="dropdown mega-menu"> 
                <a href="{{ route('shop.page') }}">Shop Page <span class="menu-label hot-menu hidden-xs">hot</span> </a>
              </li>

                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="{{ url('/') }}">Home</a></li>
                              <li><a href="#">Category</a></li>
                              <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                              <li><a href="{{ route('blog.post') }}">Blog</a></li>
                              <li><a href="{{ route('contact') }}">Contact</a></li>
                              <li><a href="{{ route('login') }}">Sign In</a></li>
                              <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                              <li><a href="{{ route('terms.condition') }}">Terms and Condition</a></li>
                              <li><a href="{{ url('show/tracking') }}">Track Orders</a></li>
                              <li><a href="{{ route('user.faq') }}">FAQ</a></li>
                              <li><a href="{{ route('error.page') }}">404</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>  
</header>


<!-- ============================================== HEADER : END ============================================== -->

@yield('content')

@php
$setting=DB::table('sitesettings')->first();
@endphp

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>        
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>{{ $setting->address }}</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>+88 {{ $setting->phone_one }}<br>
                    +88 {{ $setting->phone_two }}</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="#">{{ $setting->email }}</a></span> </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Customer Service</h4>
          </div>        
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="{{ route('home') }}" title="Contact us">My Account</a></li>
              <li><a href="{{ route('home') }}" title="About us">Order History</a></li>
              <li><a href="#" title="faq">FAQ</a></li>
              <li><a href="#" title="Popular Searches">Specials</a></li>
              <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
            </ul>
          </div>
        </div>       
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Corporation</h4>
          </div>        
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Your Account" href="#">About us</a></li>
              <li><a title="Information" href="#">Customer Service</a></li>
              <li><a title="Addresses" href="#">Company</a></li>
              <li><a title="Addresses" href="#">Investor Relations</a></li>
              <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Why Choose Us</h4>
          </div>      
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
              <li><a href="{{ route('blog.post') }}" title="Blog">Blog</a></li>
              <li><a href="#" title="Company">Company</a></li>
              <li><a href="#" title="Investor Relations">Investor Relations</a></li>
              <li class=" last"><a href="#" title="Suppliers">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->facebook }}" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->twitter }}" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->google_plus }}" title="GooglePlus"></a></li>
          <li class="rss pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->rss }}" title="RSS"></a></li>
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->pinterest }}" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->linkedin }}" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{ $setting->youtube }}" title="Youtube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="{{ asset('public/frontend/images/payment/bkash.png')}}" alt="" width="100px"></li>
            <li><img src="{{ asset('public/frontend/images/payment/rocket.png')}}" alt="" width="100px"></li>
            <li><img src="{{ asset('public/frontend/images/payment/nagad.png')}}" alt="" width="100px"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>



<!--product cart add modal-->

<!-- Modal -->
<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-md-4">
              <div class="card" style="width: 16rem;">
              <img src="" class="card-img-top" id="pimage" style="height: 240px;">
              <div class="card-body">
               
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
              <ul class="list-group">
                <li class="list-group-item"> <h5 class="card-title" id="pname"></h5></span></li>
             <li class="list-group-item">Product code: <span id="pcode"> </span></li>
              <li class="list-group-item">Category:  <span id="pcat"> </span></li>
              <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
              <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
              <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
            </ul>
          </div>
          <div class="col-md-4 ">
              <form action="{{ route('insert.into.cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group" id="colordiv">
                  <label for="">Color</label>
                  <select name="color" class="form-control" style="color:red">
                  </select>
                </div>
                 <div class="form-group" id="sizediv" >
                  <label for="exampleInputEmail1">Size</label>
                  <select name="size" class="form-control" id="size" style="color:red">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Quantity</label>
                  <input type="number" class="form-control" value="1" name="qty" style="color:red" min="1">
                </div>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
              </form>
           </div>
         </div>
      </div>  
    </div>
  </div>
</div>

<!--modal end-->


<a href="#" class="go-top"><i class="fa fa-arrow-up"></i></a>




<script src="{{ asset('public/frontend/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/owl.carousel.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/echo.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/lightbox.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap-select.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/wow.min.js')}}"></script> 
<script src="{{ asset('public/frontend/js/scripts.js')}}"></script>
<script src="{{ asset('public/frontend/js/BUP.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  
<script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
</script>    

<script>  
         $(document).on("click", "#return", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Return?",
                  text: "Once Return, You will Return Your Money!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Cancel!");
                  }
                });
            });
</script> 

<script>
      $(document).ready(function() {
      // Show or hide the sticky footer button
      $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
          $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
      });
      
      // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
        
        $('html, body').animate({scrollTop: 0}, 300);
      })
    });

</script>

<!-- <script>
   $(document).ready(function(){

      $('#bkash').click(function(){
        $('#bkash1').removeClass('hidden');
        $('#rocket1').addClass('hidden');
        $('#cashon1').addClass('hidden');
      });

      $('#rocket').click(function(){
        $('#rocket1').removeClass('hidden');
        $('#bkash1').addClass('hidden');
        $('#cashon1').addClass('hidden');
      });


      $('#cashon').click(function(){
        $('#cashon1').removeClass('hidden');
        $('#bkash1').addClass('hidden');
        $('#rocket1').addClass('hidden');
      });


   });

</script>
 -->

<script>
  function productview(id){
     $.ajax({
      url: "{{  url('/cart/product/view/') }}/"+id,
      type:"GET",
      dataType:"json",
      success:function(data){
        $('#pname').text(data.product.product_name);
        $('#pimage').attr('src',data.product.image_one);
        $('#pcat').text(data.product.category_name);
        $('#psubcat').text(data.product.subcategory_name);
        $('#pbrand').text(data.product.brand_name);
        $('#pcode').text(data.product.product_code);
        $('#product_id').val(data.product.id);
        var d =$('select[name="size"]').empty();
        $.each(data.size, function(key, value){
         $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
         if(data.size==""){
            $('#sizediv').hide();
         }else{
          $('#sizediv').show();
         }
      });

      var d =$('select[name="color"]').empty();
      $.each(data.color, function(key, value){
        $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
        if(data.color==""){
            $('#colordiv').hide();
         }else{
          $('#colordiv').show();
         }
        
      });
    }

     });  
  }
</script>




</body>
</html>