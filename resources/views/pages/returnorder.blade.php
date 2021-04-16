@extends('layouts.app')
@section('content')
<style>
	/* .user_dasborad{
		width: 90%;
		height: auto;
		margin: 20px;
		padding: 20px;
	}
	.card{
		background: #fff;
	}
	.user_profile{
		margin-top: 70px;
		margin-bottom: 30px;
		padding: 20px;
	}
	.card_work{
		padding: 15px;
	} */

    .card{
        background: #fff;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    table{
        margin-top: 30px;
        margin-bottom: 30px;
        overflow: hidden;
    }

</style>

<div class="container">
    <div class="row justify-content-center user_profile">
        <div class="col-md-9">
            <div class="card-body card">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Payment Type</th>
                            <th>Return</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                        <tr>
                            <td>{{ $row->payment_type }}</td>
                            <td>
                                 @if($row->return_order == 0)
                                <span class="badge badge-warning" style="background-color: red;">No Request</span>
                                @elseif($row->return_order == 1)
                                <span class="badge badge-info" style="background-color: #17A2B8;">Pending</span>
                                @elseif($row->return_order == 2) 
                                <span class="badge badge-info" style="background-color: #17A2B8;;">Success</span>
                                @endif

                            </td>
                            <td>{{ $row->total }} ৳</td>
                            <td>{{ $row->date }}</td>
                            <td>
                                @if($row->status == 0)
                                <span class="badge badge-warning" style="background-color: red;">Pending</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-info" style="background-color: #17A2B8;">Payment Accept</span>
                                @elseif($row->status == 2) 
                                <span class="badge badge-info" style="background-color: #17A2B8;;">Progress </span>
                                @elseif($row->status == 3)  
                                <span class="badge badge-success" style="background-color: green;">Delevered </span>
                                @else
                                <span class="badge badge-danger" style="background-color: red;">Cancel </span>
                                @endif
                            </td>
                            <td>
                                @if($row->return_order == 0)
                                <a href="{{ url('request/return/'.$row->id) }}" class="btn btn-primary btn-sm" id="return">Return Order</a>
                                @elseif($row->return_order == 1)
                                <span class="badge badge-info" style="background-color: #17A2B8;">Pending</span>
                                @elseif($row->return_order == 2) 
                                <span class="badge badge-info" style="background-color: #17A2B8;;">Success</span>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                </table>      
            </div>
     
        </div>

        <div class="col-md-3">
            <div class="card card_work" style="width: 24rem;">
                <div class="card-header">
                    <img src="{{ asset('public/frontend/images/avatar.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                    </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                    <li class="list-group-item"><a href="#"> Edit Profile </a></li>
                    <li class="list-group-item"><a href="{{ route('success.orderlist') }}"> Return Order </a></li>
               
                 </ul>
                 <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
