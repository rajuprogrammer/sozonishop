@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List</h6>
         <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product ID</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Category</th>
                  <th class="wd-15p">Brand</th>
                  <th class="wd-15p">Quantity</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($product as $row)
                <tr>
                  <td>{{ $row->product_code }}</td>
                  <td>{{ $row->product_name }}</td>
                  <td>
                    <img src="{{ URL::to($row->image_one) }}" alt="" height="70px" width="40px">
                  </td>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->brand_name }}</td>
                  <td>{{ $row->product_quantity }}</td>
                  <td>
                    @if($row->status==1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                  
                  <td>
                  	<a href="{{ URL::to('edit/product/'.$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                  	<a href="{{ URL::to('delete/product/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>

                    <a href="{{ URL::to('view/product/'.$row->id) }}" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye"></i></a>

                    @if($row->status==1)
                      <a href="{{ URL::to('inactive/product/'.$row->id) }}" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                    @else
                      <a href="{{ URL::to('active/product/'.$row->id) }}" class="btn btn-info btn-sm" title="Active"><i class="fa fa-thumbs-up"></i></a>
                    @endif

                    
                  </td>
                </tr>  
                @endforeach                                      
              </tbody>
            </table>
          </div>
        </div>

      </div>
</div>



@endsection