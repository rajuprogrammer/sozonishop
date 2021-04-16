@extends('layouts.app')
@section('content')




    <div class="contact_menu dark">
        <div id="address-content">
        <div class="bcg skrollable skrollable-between"  data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#address-content"  style="background-image: url({{ asset('public/frontend/images/bg.jpg') }}); background-size: cover; background-position: center;  width: 100%; height: auto;">
          <!-- BG transparent -->
          <div class="bg-transparent padding-100">
            <div class="container">
              <div class="row">
                <div class="bg_trans_logo">
                     <img src="{{ asset('public/frontend/images/logo.png') }}" alt="">
                </div>
                <div class="bg_trans_text">
                    <p>Contact-Us</p>
                </div>
              </div>
          </div>
        </div>
        <!-- End BG transparent -->
        <div class="bg_text_input">
            <div class="container">
           <h2>SEND MESSAGE</h2>
           <div class="contact-form">
            <form method="post" action="{{ route('contact.store') }}" class="form">
              @csrf
              <!-- Form Group -->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="name" class="form-control text" placeholder="Name *">
                    </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="email" class="form-control text" placeholder="E-mail *">
                    </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="phone" class="form-control text man" placeholder="Phone numbar">
                    </div>
                    <!-- End Element -->
                  </div>
                </div>
              </div>
              <!-- End form group -->
              <div class="row">
                <div class="col-md-12">
                  <!-- Form Group -->
                  <div class="form-group">
                    <!-- Element -->
                    <div class="element">
                      <div>
                        <!-- Element -->
                        <div class="element">
                          <textarea name="message" class="text textarea" placeholder="Message *"></textarea>
                        </div>
                        <!-- End Element -->
                      </div>
                    </div>
                    <!-- End Element -->
                  </div>
                  <!-- End form Group -->
                </div>
              </div>
              <!-- Element -->
              <div class="element ">
                <button type="submit" id="submit" value="Send" class="btn btn-black">Send</button>
                <div class="loading"></div>
              </div>
              <!-- End Element -->
            </form>
            <div class="done">
                <strong>Thank you!</strong> We have received your message. 
            </div>
          </div>
      </div>
        </div>
        <!-- **********************input box end******* -->
        @php
        $contact = DB::table('sitesettings')->first();
        @endphp
        <div class="bg_contact_numbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bg_address_cont">
                            <div class="bg_address_ico">
                                <i class="fa fa-road"></i>
                            </div>
                            <div class="bg_address_text">
                                <h2>ADDRESS</h2>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg_phone_cont">
                            <div class="bg_phone_ico">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="bg_phone_text">
                                <h2>PHONE</h2>
                                <p>{{ $contact->phone_one }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg_email_cont">
                            <div class="bg_email_ico">
                                <i class="fa fa-envelope-square"></i>
                            </div>
                            <div class="bg_email_text">
                                <h2>E-MAIL</h2>
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>        
    </div>
</div>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.4237206028874!2d90.35887491494807!3d23.803527184563237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1fbc53478ab%3A0xd0124fcc4d2f6228!2sMirpur-2%2CPolice%20Box%2CDMP!5e0!3m2!1sen!2sbd!4v1617942038734!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
</div>


@endsection