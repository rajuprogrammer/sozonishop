@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Post Category</h6>
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
            <form action="{{ url('update/postcategory/'.$postcategory->id) }}" method="post">
              @csrf
                <div class="modal-body pd-20">              
                <div class="form-group">
                    <label for="category_name">Post Category Name English Update</label>
                    <input type="text" class="form-control" id="category_name" value="{{ $postcategory->category_name_en }}" name="category_name_en">
                </div>   
                <div class="form-group">
                    <label for="category_name">Post Category Name Bangla Update</label>
                    <input type="text" class="form-control" id="category_name" value="{{ $postcategory->category_name_bn }}" name="category_name_bn">
                </div>            
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
            </form>
           
          </div>
        </div>

      </div>
    </div>


@endsection

