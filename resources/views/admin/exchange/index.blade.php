@extends('layouts.admin')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{Session::get('message')}}</strong>
</div>
@endif
<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Pending Exchange Table</h2>
	</div>
	<div class="card-body">
		{{-- <div class="table-responsive">
			<table class="table card-table table-vcenter text-nowrap align-items-center text-center">
				<thead class="thead-light">
					<tr>
						
						<th>User</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Method</th>
                        <th>Client Status</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($pending_exchanges) > 0)
					@foreach($pending_exchanges as $exchange)
					<tr>
						
                        <td class="font-weight-bold">{{$exchange->user_id}}</td>
                        <td class="font-weight-bold">
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->send_amount}}</li>
                                <li class="nav-item btn btn-outline-success btn-sm">Received: {{$exchange->received_amount}}</li>
                            </ul>
                        </td>
                        <td class="font-weight-bold">
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->send_currency}}</li>
                                <li class="nav-item btn btn-outline-success btn-sm">Received: {{$exchange->received_currency}}</li>
                            </ul>
                        </td>
                        <td class="font-weight-bold">
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->send_method}}</li>
                                <li class="nav-item btn btn-outline-success btn-sm">Received: {{$exchange->received_method}}</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item">
                                    @if($exchange->client_status == "pending")
                                    <span class="btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->client_status}} </span>
                                    @else
                                    <span class="btn btn-outline-success btn-sm mb-1">Send: {{$exchange->client_status}} </span>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    @if($exchange->admin_status == "pending")
                                    <span class="btn btn-outline-danger btn-sm">Received: {{$exchange->admin_status}}</span>
                                    @else
                                    <span class="btn btn-outline-success btn-sm">Received: {{$exchange->admin_status}}</span>
                                    @endif
                                </li>
                            </ul>
                        </td>
                        <td>
                            @if($exchange->status == "pending")
                                <span class="btn btn-outline-danger btn-sm text-uppercase">Pending</span>
							@else
                                <span class="btn btn-outline-success btn-sm text-uppercase">Complete</span>
							@endif
                        </td>
                        <td>
                            
							<div class="d-flex justify-content-center">
                                <a href="" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye mr-0"></i>
                                </a>
								<a href="" class="btn btn-sm btn-warning">
									<i class="fa fa-edit mr-0"></i>
								</a>
	
								<form action="" method="POST">
									@csrf
									@method('DELETE')
	
									<button type="submit" class="btn btn-sm btn-danger">
										<i class="fa fa-trash mr-0"></i>
									</button>
								</form>
							</div>
                        </td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="8" class="text-danger font-weight-bold">No Data Found...</td>
					</tr>
					@endif
				</tbody>
			</table>
        </div> --}}

        <div class="table-responsive">
			<table class="table card-table table-vcenter text-nowrap align-items-center text-center">
				<thead class="thead-light">
					<tr>
						<th>ID</th>
						<th>From</th>
                        <th>To</th>
                        <th>Amount send (receive)</th>
                        <th>Exchange ID</th>
                        <th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($pending_exchanges) > 0)
					@foreach($pending_exchanges as $exchange)
					<tr>
                        <td class="font-weight-bold">{{$loop->index + 1}}</td>
                        <td class="font-weight-bold text-capitalize">{{$exchange->send_method}} {{$exchange->send_currency}}</td>
                        <td class="font-weight-bold text-capitalize">{{$exchange->received_method}} {{$exchange->received_currency}}</td>
						<td class="font-weight-bold">{{$exchange->send_amount}} {{$exchange->send_currency}} ({{$exchange->received_amount}} {{$exchange->received_currency}})</td>
						<td class="font-weight-bold text-uppercase">{{$exchange->exchange_id}}</td>
                        <td class="font-weight-bold">
							<span class="btn btn-outline-light btn-sm text-uppercase mb-2">{{$exchange->status}}</span> <br>

							<form action="{{route('admin.exchange.complete', $exchange->id)}}" method="POST">
								@csrf
								@method('PATCH')

								<button type="submit" class="btn btn-outline-success btn-sm text-center">
									<i class="fa fa-exchange-alt mr-0"></i>
								</button>
							</form>
                        </td>
                        <td>
							<div class="d-flex justify-content-center">
                                {{-- <a href="" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye mr-0"></i>
                                </a>
								<a href="" class="btn btn-sm btn-warning">
									<i class="fa fa-edit mr-0"></i>
								</a> --}}
	
								<form action="{{route('admin.exchange.destroy', $exchange->id)}}" method="POST">
									@csrf
									@method('DELETE')
	
									<button type="submit" class="btn btn-sm btn-danger">
										<i class="fa fa-trash mr-0"></i>
									</button>
								</form>
							</div>
                        </td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="7" class="text-danger font-weight-bold">No Data Found...</td>
					</tr>
					@endif
				</tbody>
			</table>
        </div>
	</div>
</div>

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Approved Exchange Table</h2>
	</div>
	<div class="card-body">
		{{-- <div class="table-responsive">
			<table class="table card-table table-vcenter text-nowrap align-items-center text-center">
				<thead class="thead-light">
					<tr>
						<th>User</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Method</th>
                        <th>Client Status</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($approved_exchanges) > 0)
					@foreach($approved_exchanges as $exchange)
					<tr>
						
                        <td class="font-weight-bold">{{$exchange->user_id}}</td>
                        <td class="font-weight-bold">
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->send_amount}}</li>
                                <li class="nav-item btn btn-outline-success btn-sm">Received: {{$exchange->received_amount}}</li>
                            </ul>
                        </td>
                        <td class="font-weight-bold">
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->send_currency}}</li>
                                <li class="nav-item btn btn-outline-success btn-sm">Received: {{$exchange->received_currency}}</li>
                            </ul>
                        </td>
                        <td class="font-weight-bold">
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item btn btn-outline-danger btn-sm mb-1">Send: {{$exchange->send_method}}</li>
                                <li class="nav-item btn btn-outline-success btn-sm">Received: {{$exchange->received_method}}</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav flex-column align-items-center">
                                <li class="nav-item">
                                    <span class="btn btn-outline-success btn-sm mb-1">Send: {{$exchange->client_status}} </span>
                                </li>
                                <li class="nav-item">
                                    <span class="btn btn-outline-success btn-sm">Received: {{$exchange->admin_status}}</span>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <span class="btn btn-outline-success btn-sm text-uppercase">Complete</span>
                        </td>
                        <td>
							<div class="d-flex justify-content-center">
                                <a href="" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye mr-0"></i>
                                </a>
								<a href="" class="btn btn-sm btn-warning">
									<i class="fa fa-edit mr-0"></i>
								</a>
	
								<form action="" method="POST">
									@csrf
									@method('DELETE')
	
									<button type="submit" class="btn btn-sm btn-danger">
										<i class="fa fa-trash mr-0"></i>
									</button>
								</form>
							</div>
                        </td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="8" class="text-danger font-weight-bold">No Data Found...</td>
                    </tr>
					@endif
				</tbody>
			</table>
        </div> --}}
        <div class="table-responsive">
			<table class="table card-table table-vcenter text-nowrap align-items-center text-center">
				<thead class="thead-light">
					<tr>
						<th>ID</th>
						<th>From</th>
                        <th>To</th>
						<th>Amount send (receive)</th>
						<th>Exchange ID</th>
                        <th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($completed_exchanges) > 0)
					@foreach($completed_exchanges as $exchange)
					<tr>
                        <td class="font-weight-bold">{{$loop->index + 1}}</td>
                        <td class="font-weight-bold text-capitalize">{{$exchange->send_method}} {{$exchange->send_currency}}</td>
                        <td class="font-weight-bold text-capitalize">{{$exchange->received_method}} {{$exchange->received_currency}}</td>
						<td class="font-weight-bold">{{$exchange->send_amount}} {{$exchange->send_currency}} ({{$exchange->received_amount}} {{$exchange->received_currency}})</td>
						<td class="font-weight-bold text-uppercase">{{$exchange->exchange_id}}</td>
                        <td class="font-weight-bold">
							<span class="btn btn-outline-success btn-sm text-uppercase">{{$exchange->status}}</span>
							
                        </td>
                        <td>
							<div class="d-flex justify-content-center">
                                {{-- <a href="" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye mr-0"></i>
                                </a>
								<a href="" class="btn btn-sm btn-warning">
									<i class="fa fa-edit mr-0"></i>
								</a> --}}
	
                                <form action="{{route('admin.exchange.destroy', $exchange->id)}}" method="POST">
									@csrf
									@method('DELETE')
	
									<button type="submit" class="btn btn-sm btn-danger">
										<i class="fa fa-trash mr-0"></i>
									</button>
								</form>
							</div>
                        </td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="7" class="text-danger font-weight-bold">No Data Found...</td>
					</tr>
					@endif
				</tbody>
			</table>
        </div>
	</div>
</div>
@endsection