@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Edit Payment Fee</h2>
	</div>
	<div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-12">
                <form action="{{route('admin.fee.update', $fee->id)}}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="amount">Payment Fee Amount</label>
                        <input type="text" class="form-control {{$errors->first('amount') ? 'border-danger' : 'border-success'}}" name="amount" id="amount" placeholder="Payment Fee Amount" value="{{$fee->amount}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('amount')}}</div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Update method</button>
                    </div>
                </form>
            </div>
        </div>
		
	</div>
</div>

@endsection