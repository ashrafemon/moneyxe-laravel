@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Currency Table</h2>
	</div>
	<div class="card-body">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>{{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="table-responsive">
			<table class="table card-table table-vcenter text-nowrap align-items-center text-center">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Code</th>
						<th>Value</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($currencies) > 0)
					@foreach($currencies as $currency)
					<tr>
						<td class="font-weight-bold">{{$loop->index + 1}}</td>
						<td class="font-weight-bold">{{$currency->title}}</td>
						<td class="text-uppercase font-weight-bold">{{$currency->code}}</td>
						<td class="font-weight-bold">{{$currency->value}}</td>
						<td>
							@if($currency->status)
								<span class="btn btn-outline-success btn-sm text-uppercase">Active</span>
							@else
								<span class="btn btn-outline-danger btn-sm text-uppercase">Inactive</span>
							@endif
						</td>
						<td>
							{{-- <a href="" class="btn btn-sm btn-info">
								<i class="fa fa-eye mr-0"></i>
							</a> --}}
							<div class="d-flex justify-content-center">
								<a href="{{route('admin.currency.edit', $currency->id)}}" class="btn btn-sm btn-warning">
									<i class="fa fa-edit mr-0"></i>
								</a>
	
								<form action="{{route('admin.currency.destroy', $currency->id)}}" method="POST">
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
						<td colspan="6" class="text-danger font-weight-bold">No Data Found...</td>
					</tr>
					@endif

					
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection