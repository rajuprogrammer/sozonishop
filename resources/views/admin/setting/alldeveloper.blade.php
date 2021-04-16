
@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">All Developer</h6>
         <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Developer Name</th>
                  <th class="wd-15p">Developer Position</th>
                  <th class="wd-15p">Dewveloper Logo</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($developer as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->position }}</td>
                  <td>
                    <img src="{{ URL::to($row->images) }}" alt="" height="70px" width="120px">
                  </td>
                  <td>
                  	<a href="{{ URL::to('edit/developer/'.$row->id) }}" class="btn btn-info">Edit</a>
                  	<a href="{{ URL::to('delete/developer/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
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