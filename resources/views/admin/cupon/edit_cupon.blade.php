@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Cupon Update</h6>
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
            <form action="{{ url('update/cupon/'.$cupon->id) }}" method="post">
              @csrf
                <div class="modal-body pd-20">              
                <div class="form-group">
                    <label for="category_name">Cupon Update</label>
                    <input type="text" class="form-control" id="category_name" value="{{ $cupon->cupon }}" name="cupon">
                </div>  
                <div class="form-group">
                    <label for="category_name">Cupon Discount</label>
                    <input type="text" class="form-control" id="category_name" value="{{ $cupon->discount }}" name="discount">
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