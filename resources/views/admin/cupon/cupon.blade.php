@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Cupon Table</h5>      
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Cupon List
          <a href="#" class="btn btn-warning btn-sm" style="float: right" data-toggle="modal" data-target="#modaldemo3">Add</a>
          </h6>
         <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Cupon Code</th>
                  <th class="wd-15p">Cupon Percentage</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($cupon as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->cupon }}</td>
                  <td>{{ $row->discount }} (%)</td>
                  <td>
                  	<a href="{{ URL::to('edit/cupon/'.$row->id) }}" class="btn btn-info">Edit</a>
                  	<a href="{{ URL::to('delete/cupon/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
                  </td>
                </tr>  
                @endforeach                                      
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

<div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Cupon Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
            <form action="{{ route('store.cupon') }}" method="post">
            	@csrf
              	<div class="modal-body pd-20">             	
					<div class="form-group">
					    <label for="category_name">Cupon Code</label>
					    <input type="text" class="form-control" id="category_name" placeholder="Cupon" name="cupon" required="">
					</div>
          <div class="form-group">
              <label for="category_name">Cupon Discount (%)</label>
              <input type="text" class="form-control" id="category_name" placeholder="Cupon Discount" name="discount" required="">
          </div>              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>

@endsection