@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post List</h6>
         <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Post Title</th>
                  <th class="wd-15p">Category</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($post as $row)
                <tr>
                  <td>{{ $row->post_title_en }}</td>
                  <td>{{ $row->category_name_en }}</td>
                  <td>
                    <img src="{{ URL::to($row->post_image) }}" alt="" height="70px" width="80px">
                  </td>
                  <td>
                  	<a href="{{ URL::to('edit/post/'.$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                  	<a href="{{ URL::to('delete/post/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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