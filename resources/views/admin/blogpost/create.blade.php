@extends('admin.admin_layouts')

@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Post Add <a href="#" class="btn btn-success btn-sm pull-right">All Post</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New product add form</p>
          <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (BANGLA): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->



              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Description(ENGLISH)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="details_en">
                    
                   </textarea>
                </div>  
              </div>

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Description(BANGLA)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote1" name="details_bn">
                    
                   </textarea>
                </div>  
              </div>


              <div class="col-lg-4">
                <lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="" accept="image/*">
                <span class="custom-file-control"></span>
                <img src="#" id="one" >
              </label>
              </div>

            </div><!-- row -->

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
      </div>     
    
      </div>
    </div>

<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>


    
@endsection
