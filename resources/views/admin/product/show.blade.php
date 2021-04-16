@extends('admin.admin_layouts')

@section('admin_content')

<style>
  strong{
    color: #000;
    font-size: 16px;
  }
</style>

    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Show</h6>
         
         
            <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->product_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label><br>
                   <strong>{{ $product->product_code }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label><br>
                   <strong>{{ $product->product_quantity }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                   <strong>{{ $product->category_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->subcategory_name }}</strong>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label><br>
                     <strong>{{ $product->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->product_size }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                   <strong>{{ $product->product_color }}</strong>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label><br>
                   <strong>{{ $product->selling_price }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group" style="border:1px solid grey;padding: 10px;">
                  <label class="form-control-label">Product Description<span class="tx-danger">*</span></label><br>
                  <p><strong>
                    {!! $product->product_description !!}
                    </strong>
                  </p>

                </div>  
              </div>
               <div class="col-lg-12">
                <div class="form-group" style="border:1px solid grey;padding: 10px;">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label><br>
                  <p><strong>
                    {!! $product->product_details !!}
                    </strong>
                  </p>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->video_link }}</strong>
                </div>  
              </div>

              <div class="col-lg-4">
                <lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($product->image_one) }}" id="one" height="80px" width="80px">
              </label>
              </div>
              <div class="col-lg-4">
                <lebel>Image Two <span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($product->image_two) }}" id="two" height="80px" width="80px">
              </label>
              </div>
              <div class="col-lg-4">
                <lebel>Image Three <span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($product->image_three) }}" id="three" height="80px" width="80px">
              </label>
              </div>
            </div><!-- row -->
            <br><hr>
            <div class="row">
              <div class="col-lg-4">
                <label class="">

                  @if($product->main_slider == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>Main Slider</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="">
                  @if($product->hot_deals == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif

                  <span>Hot Deal</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="">
                  @if($product->special_offer == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>Special Offer</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="">
                  @if($product->special_deals == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>Special Deal</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="">
                  @if($product->best_seller == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>Best Seller</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="">
                  @if($product->wide_banner == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>Wide Banner</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="">
                  @if($product->new_product == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>New Product</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="">
                  @if($product->featured_product == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>Featured Product</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="">
                  @if($product->newarivals_product == 1)
                    <span class="badge badge-success"><i class="fa fa-check-circle"></i></span>
                  @else
                    <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>
                  @endif
                  <span>New Arrivals</span>
                </label>
              </div>
            </div>
          </div>

      </div>     
    
      </div>
    </div>


    
@endsection
