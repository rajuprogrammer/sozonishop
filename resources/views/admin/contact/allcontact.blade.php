@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Contact Table</h5>      
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">User Contact List</h6>
         <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-20p">Phone</th>
                  <th class="wd-20p">Message</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($contact as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->message }}</td>
                </tr>  
                @endforeach                                      
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

@endsection