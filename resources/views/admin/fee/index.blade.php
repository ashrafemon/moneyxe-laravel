@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Payment Fee Table</h2>
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
						<th>Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                    @if($fee)
					<tr>
                        <td>{{$fee->id}}</td>
                        <td>{{$fee->amount}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
							<a href="{{route('admin.fee.edit', $fee->id)}}" class="btn btn-sm btn-warning">
									<i class="fa fa-edit mr-0"></i>
								</a>
							</div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="3">No data found...</td>
                    </tr>
                    @endif

					
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection