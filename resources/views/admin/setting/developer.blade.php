@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Website Setting  </h6>
          <p class="mg-b-20 mg-sm-b-30"> Website Update</p>

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="{{ route('store.developer') }}" method="post" enctype="multipart/form-data">
          	@csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Full Name <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Position<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="position"  required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Details <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="details"  required="">
                </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Profile Pic<span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="images"  required="" accept="image/*">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Insert </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->




@endsection
