@extends('admin.admin_layouts')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Dabase Back Up Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Database Back Up
          	<a href="{{ route('admin.backup.now') }}" class="btn btn-sm btn-warning" style="float: right;" >Back Up Now</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">File Name</th>
                  <th class="wd-15p">Size</th>
                  <th class="wd-15p">Path</th>
                  <th class="wd-15p">Download</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($files as $row)
                <tr>
                  <td>{{ $row->getFilename() }}</td>
                  <td>{{ $row->getSize() }}</td>
                  <td>{{ $row->getpath() }}</td>
                  <td><a href="{{ url($row->getFilename()) }}" class="]btn btn-sm btn-primary" title="download"><i class="fa fa-download"></i></a></td>
                  
                  <td>
                    <a href="{{ url('delete/database/'.$row->getFilename()) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->



@endsection