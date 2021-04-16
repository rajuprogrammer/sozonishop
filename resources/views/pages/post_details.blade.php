@extends('layouts.app')
@section('content')

<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Blog Details</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
   <div class="container">
      <div class="row">
         <div class="blog-page">
            <div class="col-md-9">

            @foreach($post_details as $row)	
               <div class="blog-post wow fadeInUp">
                  <img class="img-responsive" src="{{ asset($row->post_image) }}" alt="" width="100%">
                  @if(session()->get('lang') =='bangla')
                  <h1>{{ $row->post_title_bn }}</h1>
                  <span class="author">অ্যাডমিন</span>
                  <span class="review">7 কমেন্ট</span>
                  <span class="date-time">{{ $row->created_at }}</span>
                  <p>{!! $row->details_bn !!}</p>
                  @else
                  <h1>{{ $row->post_title_en }}</h1>
                  <span class="author">Admin</span>
                  <span class="review">7 Comments</span>
                  <span class="date-time">{{ $row->created_at }}</span>
                  <p>{!! $row->details_en !!}</p>
                  @endif
       
                  <div class="social-media">
                     <span>share post:</span>

<!--                      <a href="#"><i class="fa fa-facebook"></i></a>
                     <a href="#"><i class="fa fa-twitter"></i></a>
                     <a href="#"><i class="fa fa-linkedin"></i></a>
                     <a href="#"><i class="fa fa-rss"></i></a>
                     <a href="#" class="hidden-xs"><i class="fa fa-pinterest"></i></a> -->
                  </div>
                   <div class="sharethis-inline-share-buttons"></div>
               </div>
               <br><br><br>
            @endforeach   
            
            </div>
           
         </div>
      </div>
      <br><br>
   </div>
</div>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6045851832910c0018e21804&product=inline-share-buttons" async="async"></script>

@endsection