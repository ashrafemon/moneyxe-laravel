@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Add Payment Method</h2>
	</div>
	<div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-12">
                <form action="{{route('admin.payment.method.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="title">Payment Method Title</label>
                        <input type="text" class="form-control {{$errors->first('title') ? 'border-danger' : 'border-success'}}" name="title" id="title" placeholder="Payment Method Title" value="{{old('title')}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('title')}}</div>
                    </div>

                    <div class="form-group">
                        <label for="method_id">Payment Method ID</label>
                        <input type="text" class="form-control {{$errors->first('method_id') ? 'border-danger' : 'border-success'}}" name="method_id" id="method_id" placeholder="Payment Method ID" value="{{old('method_id')}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('method_id')}}</div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Add Payment Method</button>
                    </div>
                </form>
            </div>
        </div>
		
	</div>
</div>

@endsection