@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Developer Update</h6>
         <br>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
          <div class="table-wrapper">
            <form action="{{ url('update/developer/'.$developer->id) }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="modal-body pd-20"> 

                <div class="form-group">
                    <label for="brand_name">Developer Name Update</label>
                    <input type="text" class="form-control" id="brand_name" value="{{ $developer->name }}" name="name" required="">
                </div> 


                <div class="form-group">
                    <label for="brand_name">Developer Name Update</label>
                    <input type="text" class="form-control" id="brand_name" value="{{ $developer->position }}" name="position" required="">
                </div> 


                <div class="form-group">
                    <label for="brand_name">Developer Name Update</label>
                    <input type="text" class="form-control" id="brand_name" value="{{ $developer->details }}" name="details" required="">
                </div> 




                <div class="form-group">
                    <label for="brand_logo">Developer Logo Update</label>
                    <input type="file" class="form-control" id="brand_logo" name="images">
                </div> 

                <div class="form-group">
                	<label for="brand_logo">Old Logo</label>
                	<img src="{{ URL::to($developer->images) }}" alt="" height="70px" width="80px;">
                	<input type="hidden" name="oldlogo" value="{{ $developer->images }}">
                </div>

              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
            </form>
           
          </div>
        </div>

      </div>
    </div>


@endsection