@extends('layouts.app')
@section('content')


<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Blog</li>
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

            @foreach($post as $row)	

               <div class="blog-post  wow fadeInUp">
                  <a href="{{ url('post/details/'.$row->id) }}"><img class="img-responsive" src="{{ asset($row->post_image) }}" alt="" width="100%"></a>

                  @if(session()->get('lang') =='bangla')
                  <h1><a href="{{ url('post/details/'.$row->id) }}">{{ $row->post_title_bn }}</a></h1>
                  <span class="author">অ্যাডমিন</span>
                  <span class="review">6 কমেন্ট</span>
                  <span class="date-time">{{ $row->created_at }}</span>
                  <p>{!! $row->details_bn !!}</p>
                  <a href="{{ url('post/details/'.$row->id) }}" class="btn btn-upper btn-primary read-more">আরো পড়ুন</a>
                  @else
                  <h1><a href="{{ url('post/details/'.$row->id) }}">{{ $row->post_title_en }}</a></h1>
                  <span class="author">Admin</span>
                  <span class="review">6 Comments</span>
                  <span class="date-time">{{ $row->created_at }}</span>
                  <p>{!! $row->details_en !!}</p>
                  <a href="{{ url('post/details/'.$row->id) }}" class="btn btn-upper btn-primary read-more">read more</a>
                  @endif     
               </div>
               <br>
            @endforeach   
            <br>


               <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                  <div class="text-right">
                     <div class="pagination-container">
                        <ul class="list-inline list-unstyled">
                           <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                           <li><a href="#">{{ $post->links() }}</a></li>
                           <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                        <!-- /.list-inline -->
                     </div>
                     <!-- /.pagination-container -->    
                  </div>
                  <!-- /.text-right -->
               </div>

               <!-- /.filters-container -->				
            </div>
            <div class="col-md-3 sidebar">
               <div class="sidebar-module-container">
                  <div class="search-area outer-bottom-small">
                     <!-- <form>
                        <div class="control-group">
                           <input placeholder="Type to search" class="search-field" name="search" type="search">
                           <button type="submit" class="search-button"></button>  
                        </div>
                     </form> -->
                  </div>
                  <div class="home-banner outer-top-n outer-bottom-xs">
                     <a href="{{ asset('public/frontend/images/apps/sozonishop.apk') }}"><img src="{{ asset('public/frontend/images/apps/app.jpg') }}" alt="Image"></a>
                  </div>
                  <!-- ==============================================CATEGORY============================================== -->

@php

$cats = DB::table('categories')->skip(0)->first();
$category_id = $cats->id;
$men =DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp

                  <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                     <h3 class="section-title">Category</h3>
                     <div class="sidebar-widget-body m-t-10">
                        <div class="accordion">
                           <div class="accordion-group">
                              <div class="accordion-heading">
                                 <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
                                 Men's Fashion
                                 </a>
                              </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                       @foreach($men as $row)
                                       <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                                        @endforeach   
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner -->
                              </div>
                              <!-- /.accordion-body -->
                           </div>
                           <!-- /.accordion-group -->
@php

$cats = DB::table('categories')->skip(1)->first();
$category_id = $cats->id;
$woman = DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp                           
                           <div class="accordion-group">
                              <div class="accordion-heading">
                                 <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed">
                                 Woman's Fashion
                                 </a>
                              </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                       @foreach($woman as $row)
                                       <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                                        @endforeach  
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner -->
                              </div>
                              <!-- /.accordion-body -->
                           </div>
                           <!-- /.accordion-group -->

@php

$cats = DB::table('categories')->skip(2)->first();
$category_id = $cats->id;
$child = DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp                          
                           <div class="accordion-group">
                              <div class="accordion-heading">
                                 <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed">
                                 Child's
                                 </a>
                              </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                    @foreach($child as $row)
                                    <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                                    @endforeach 
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner -->
                              </div>
                              <!-- /.accordion-body -->
                           </div>
                           <!-- /.accordion-group -->
@php

$cats = DB::table('categories')->skip(3)->first();
$category_id = $cats->id;
$watch = DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp   
                           <div class="accordion-group">
                              <div class="accordion-heading">
                                 <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed">
                                 Watach
                                 </a>
                              </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                    @foreach($watch as $row)
                                    <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                                    @endforeach 
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner -->
                              </div>
                              <!-- /.accordion-body -->
                           </div>
                           <!-- /.accordion-group -->
@php

$cats = DB::table('categories')->skip(4)->first();
$category_id = $cats->id;
$furni = DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp   
         

                           <div class="accordion-group">
                              <div class="accordion-heading">
                                 <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed">
                                 Furniture
                                 </a>
                              </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                    @foreach($furni as $row)
                                    <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                                    @endforeach 
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner -->
                              </div>
                              <!-- /.accordion-body -->
                           </div>
                           <!-- /.accordion-group -->
@php

$cats = DB::table('categories')->skip(5)->first();
$category_id = $cats->id;
$electronics = DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp   
         
                           <div class="accordion-group">
                              <div class="accordion-heading">
                                 <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed">
                                 Electronics
                                 </a>
                              </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                    @foreach($electronics as $row)
                                    <li><a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}</a></li>
                                    @endforeach 
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner -->
                              </div>
                              <!-- /.accordion-body -->
                           </div>
                           <!-- /.accordion-group -->
                        </div>
                        <!-- /.accordion -->
                     </div>
                     <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== CATEGORY : END ============================================== -->						
                  <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                     <h3 class="section-title">tab widget</h3>
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
                        <li><a href="#recent" data-toggle="tab">recent post</a></li>
                     </ul>
                     <div class="tab-content" style="padding-left:0">
                     @foreach($post as $row) 
                        <div class="tab-pane active m-t-20" id="popular">
                           <div class="blog-post inner-bottom-30 " >
                              <img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
                              <h4><a href="{{ url('post/details/'.$row->id) }}">{{ $row->post_title_en }}</a></h4>
                              <span class="review">6 Comments</span>
                              <span class="date-time">{{ $row->created_at }}</span>
                              <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 250px;">{!! $row->details_en !!}</p>
                           </div>
                        </div>
                      @endforeach
                     </div>

                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection