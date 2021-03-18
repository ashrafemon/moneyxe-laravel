@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">User Table</h2>
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
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($users) > 0)
                    @foreach($users as $user)
                    <tr>
                        <td class="font-weight-bold">{{$loop->index + 1}}</td>
                        <td class="font-weight-bold">{{$user->name}}</td>
                        <td class="font-weight-bold">{{$user->email}}</td>
                        <td class="font-weight-bold">
                            @if($user->role == "admin")
                            <span class="btn btn-sm btn-outline-danger text-uppercase">{{$user->role}}</span>
                            @else
                            <span class="btn btn-sm btn-outline-success text-uppercase">{{$user->role}}</span>
                            @endif
                        </td>
                        <td class="font-weight-bold">
                            @if($user->status == 1)
                            <span class="btn btn-sm btn-outline-success text-uppercase">Active</span>
                            @else
                            <span class="btn btn-sm btn-outline-danger text-uppercase">Inactive</span>
                            @endif
                        </td>
                        <td class="font-weight-bold">
                            <div class="d-flex justify-content-center">
	
                                <form action="{{route('admin.user.destroy', $user->id)}}" method="POST">
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
						<td colspan="6" class="text-danger font-weight-bold">No User Found...</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection