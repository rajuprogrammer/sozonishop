@extends('layouts.app')
@section('content')


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
<div class="body-content outer-top-xs">
   <div class='container'>
      <div class='row'>
         <div class='col-md-3 sidebar'>
            <div class="sidebar-module-container">
               <div class="sidebar-filter">
                  <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                     <h3 class="section-title">shop by</h3>
                     <div class="widget-header">
                        <h4 class="widget-title">Category</h4>
                     </div>


                           
                     <div class="sidebar-widget-body">
                       

@php

$cats = DB::table('categories')->skip(0)->first();
$category_id = $cats->id;
$men =DB::table('subcategories')->where('category_id',$category_id,'subcategories.category_id')->limit(10)->get();
@endphp
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

                  <div class="sidebar-widget wow fadeInUp">
                     <div class="widget-header">
                        <h4 class="widget-title">Brand Product</h4>
                     </div>
                     <div class="sidebar-widget-body">
                        <ul class="list">
                        @foreach($brands as $row)
                        @php
                        $brand = DB::table('brands')->where('id',$row->brand_id)->first();
                        @endphp   
                           <li><a href="#">{{ $brand->brand_name }}</a></li>
                        @endforeach   
                        </ul>
                        <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                     </div>
                     <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== MANUFACTURES: END ============================================== -->
                  <!-- ============================================== COLOR============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                     <div class="widget-header">
                        <h4 class="widget-title">Colors</h4>
                     </div>
                     <div class="sidebar-widget-body">
                        <ul class="list">
                           <li><a href="#">Red</a></li>
                           <li><a href="#">Blue</a></li>
                           <li><a href="#">Yellow</a></li>
                           <li><a href="#">Pink</a></li>
                           <li><a href="#">Brown</a></li>
                           <li><a href="#">Teal</a></li>
                        </ul>
                     </div>
                     <!-- /.sidebar-widget-body -->
                  </div>

               

               </div>
               <!-- /.sidebar-filter -->
            </div>
            <!-- /.sidebar-module-container -->
         </div>
         <!-- /.sidebar -->
         <div class='col-md-9'>
            <!-- ========================================== SECTION – HERO ========================================= -->
            <div class="clearfix filters-container m-t-10">
               <div class="row">
                  <div class="col col-sm-6 col-md-2">
                     <div class="filter-tabs">
                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                           <li class="active"><a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a></li>
                           <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                        </ul>
                     </div>
                     <!-- /.filter-tabs -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-sm-12 col-md-6">
                     
                    
                  </div>
 
               </div>
               <!-- /.row -->
            </div>



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
                                    <div class="cart clearfix animate-effect">

                                      <!--  <div class="action">
                                          <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                          <button class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                           <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                         </li>

                                              <li class="add-cart-button btn-group">
                                                  <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $pro->id }}"> <i class="fa fa-heart"></i> </button>
                                                  <button class="btn btn-primary cart-btn" type="button">Wishlist</button>
                                             </li>
                                             <li class="lnk"><a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal"></i> </a></li>
                                          </ul>
                                       </div> -->

                                    
                                    </div> 
              

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


                  <!-- /.tab-pane -->
                  <div class="tab-pane " id="list-container">
                     <div class="category-product">

                     @foreach($products as $pro)        

                        <div class="category-product-inner wow fadeInUp">
                           <div class="products">
                              <div class="product-list product">
                                 <div class="row product-list-row">
                                    <div class="col col-sm-4 col-lg-4">
                                       <div class="product-image">
                                          <div class="image"><img src="{{ asset($pro->image_one) }}" alt=""></div>
                                       </div>
                                       <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-8 col-lg-8">
                                       <div class="product-info">
                                          <h3 class="name"><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}">{{ $pro->product_name }}</a></h3>
                                          <div class="rating rateit-small"></div>

                                          @if($pro->discount_price==NULL)
                                          <div class="product-price"><span class="price">৳ {{ $pro->selling_price }} </span></div>
                                          @else
                                           <div class="product-price"><span class="price"৳> {{ $pro->discount_price }} </span> <span class="price-before-discount">৳ {{ $pro->selling_price }}</span></div>
                                          @endif

                                          <!-- /.product-price -->
                                          <div class="description m-t-10">{{ $pro->product_details }}
                                          </div>
                                          <div class="cart clearfix animate-effect">
                                             <!-- <div class="action">
                                                <ul class="list-unstyled">
                                                   <li class="add-cart-button btn-group">
                                                      <button id="{{ $pro->id }}" data-toggle="modal" class="btn btn-primary icon" type="button" title="Add Cart" data-target="#cartmodal" onclick="productview(this.id);"> <i class="fa fa-shopping-cart"></i> </button>
                                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                   </li>
                                                   <li class="add-cart-button btn-group">
                                                     <button data-toggle="tooltip" class="btn btn-primary icon addwishlist" type="button" title="Wishlist" data-id="{{ $pro->id }}"> <i class="fa fa-heart"></i> </button>
                                                    </li>
                                                   <li class="lnk"><a class="add-to-cart" href="#" title="Compare"> <i class="fa fa-signal"></i> </a></li>
                                                </ul>
                                             </div> -->
                                      
                                          </div>

                                          <!-- /.cart -->
                                       </div>
                                       <!-- /.product-info -->
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.product-list-row -->
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
                              <!-- /.product-list -->
                           </div>
                           <!-- /.products -->
                        </div>

                     @endforeach      
                       
                     </div>
                     <!-- /.category-product -->
                  </div>
                  <!-- /.tab-pane #list-container -->


               </div>
               <!-- /.tab-content -->
               <div class="clearfix filters-container">
                  <div class="text-right">
                     <div class="pagination-container">
                        <ul class="list-inline list-unstyled">
                           <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                           <li><a href="#">{{ $products->links() }}</a></li>
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
            <!-- /.search-result-container -->
         </div>
         <!-- /.col -->
      </div>
      <br><br>
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


@endsection