@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Add Currency</h2>
	</div>
	<div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-12">
                <form action="{{route('admin.currency.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="title">Currency Title</label>
                        <input type="text" class="form-control {{$errors->first('title') ? 'border-danger' : 'border-success'}}" name="title" id="title" placeholder="Currency Title" value="{{old('title')}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('title')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="code">Currency Code</label>
                        <input type="text" class="form-control {{$errors->first('code') ? 'border-danger' : 'border-success'}}" name="code" id="code" placeholder="Currency Code" value="{{old('code')}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('code')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="value">Currency Value</label>
                        <input type="text" class="form-control {{$errors->first('value') ? 'border-danger' : 'border-success'}}" name="value" id="value" placeholder="Currency Value" value="{{old('value')}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('value')}}</div>
                    </div>

                    <div class="form-group">
                        <label for="symbol">Currency Symbol</label>
                        <input type="text" class="form-control {{$errors->first('symbol') ? 'border-danger' : 'border-success'}}" name="symbol" id="symbol" placeholder="Currency Symbol" value="{{old('symbol')}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('symbol')}}</div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Add Currency</button>
                    </div>
                </form>
            </div>
        </div>
		
	</div>
</div>

@endsection