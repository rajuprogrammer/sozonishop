@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Newslater Table</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Newslater List
          <a href="#" class="btn btn-danger btn-sm" style="float: right" id="delete">All Delte</a>
          </h6>
         <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Created At</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($newslater as $row)
                <tr>
                  <td><input type="checkbox"> {{ $row->id }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
                  <td>
                  	<a href="{{ URL::to('delete/newslater/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
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