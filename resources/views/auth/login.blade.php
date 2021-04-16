@extends('layouts.app')

@section('content')

<style>
    .loging_one{
background: white;
padding: 35px;
box-shadow: 0 1px 20px rgba(0,0,0,0.30), 0 8px 6px rgba(0,0,0,0.22);
}
.sing_one{
background: #fff;
padding: 35px;
box-shadow: 0 1px 20px rgba(0,0,0,0.30), 0 8px 6px rgba(0,0,0,0.22);
}
.forgot-password{
font-size: 14px;
}
.body-content .sign-in-page .sign-in h4,
.body-content .sign-in-page .create-new-account h4 {
font-size:18px;
font-family: 'Open Sans', sans-serif;
padding-bottom: 14px;
border-bottom: 1px solid #ddd;

}
.body-content .sign-in-page .sign-in p,
.body-content .sign-in-page .create-new-account p {
font-size: 15px;
color: #666;
}
.body-content .sign-in-page .sign-in .social-sign-in a,
.body-content .sign-in-page .sign-in .social-sign-in a:hover,
.body-content .sign-in-page .sign-in .social-sign-in a:focus {
border-radius: 3px;
padding: 14px 30px;
font-size: 15px;
display: inline-block;
color: #fff;
text-align: center;
}
.body-content .sign-in-page .sign-in .social-sign-in a i {
padding-right: 6px;
}
.body-content .sign-in-page .sign-in .social-sign-in .facebook-sign-in {
background-color: #3d5c98;
margin-right: 10px;
}
.body-content .sign-in-page .sign-in .social-sign-in .facebook-sign-in:hover,
.body-content .sign-in-page .sign-in .social-sign-in .facebook-sign-in:focus {
background-color: #153470;
}
.body-content .sign-in-page .sign-in .social-sign-in .twitter-sign-in {
background-color: #22aadf;
}
.body-content .sign-in-page .sign-in .social-sign-in .twitter-sign-in:hover,
.body-content .sign-in-page .sign-in .social-sign-in .twitter-sign-in:focus {
background-color: #0084B9;
}
.body-content .sign-in-page .create-new-account > span {
font-size: 20px;
font-family: 'Open Sans', sans-serif;
padding-bottom: 14px;
text-transform: uppercase;
display: inline-block;
}
.body-content .sign-in-page .create-new-account .checkbox label {
margin-bottom: 10px;
font-size: 16px;
}
.body-content .sign-in-page form .form-group span {
color: red;
}
.body-content .sign-in-page .register-form label {
font-size: 14px;
font-weight: 400;
}
.body-content .sign-in-page .register-form .form-group {
margin-bottom: 25px;
}
.body-content .sign-in-page .register-form input{
border: 1px solid rgba(0,0,0,0.22);
}

.tooltip.top {
padding: 5px 0;
margin-top: -5px;

}
.tooltip-inner {
font-family: 'Open Sans', sans-serif;
border-radius:2px;
min-width:70px;
z-index:10000
}

.checkout-page-button{
padding: 10px 30px;
}
@media only screen and (max-width: 767px){
.sing_one{
margin-top: 30px;
}
}
@media only screen and (max-width: 557px){
.sing_one{
margin-top: 30px;
}
.social-sign-in .facebook-sign-in{
margin: 10px;
}
.social-sign-in .twitter-sign-in {
margin: 10px;
}
.forgot-password{
font-size: 12px;

}

}
</style>



<!--         <div class="wrapper without_header_sidebar">
            <div class="content_wrapper">
                    <div class="login_page center_container">
                        <div class="center_content">
                            <div class="logo">
                                <img src="{{asset('public/panel/assets/images/logo.png')}}" alt="" class="img-fluid">
                            </div>
                            <form action="{{route('login')}}" class="d-block" method="post">
                                @csrf
                                <div class="form-group icon_parent">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a class="registration" href="{{route('register')}}">Create new account</a><br>
                                    <a href="{{ route('password.request') }}" class="text-white">I forgot my password</a>
                                    <button type="submit" class="btn btn-blue">Login</button>
                                </div>
                            </form>
                            <div class="footer">
                                <p>Copyright &copy; 2019 <a href="https://durbarit.com/">Durbar IT</a>. All rights reserved.</p>
                            </div>
                            
                        </div>
                    </div>
            </div>
        </div> -->

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <div class="loging_one">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>

                        <form class="register-form outer-top-xs" role="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" id="exampleInputEmail1" placeholder="Email OR Phone" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" required="" id="exampleInputPassword1" placeholder="Password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me!
                                    <span class="checkmark"></span>
                                    </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>

                        <!-- <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div> -->
                    </div>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">

                    <div class="sing_one">
                        <h4 class="checkout-subtitle">Create a new account</h4>

                        <form class="register-form outer-top-xs" role="form" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail2" placeholder="Email Address.." name="email" required="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name..." name="name" required="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="exampleInputEmail1" placeholder="Phone Numbar..." name="phone" required="">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Password" name="password" required="">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Confirm Password" name="password_confirmation" required="">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>

                    </div>
                </div>
                <!-- create a new account -->
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
