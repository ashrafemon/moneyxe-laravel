@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header bg-transparent border-0">
		<h2 class=" mb-0">Edit Currency</h2>
	</div>
	<div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-12">
                <form action="{{route('admin.currency.update', $currency->id)}}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="title">Currency Title</label>
                        <input type="text" class="form-control {{$errors->first('title') ? 'border-danger' : 'border-success'}}" name="title" id="title" placeholder="Currency Title" value="{{$currency->title}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('title')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="code">Currency Code</label>
                        <input type="text" class="form-control {{$errors->first('code') ? 'border-danger' : 'border-success'}}" name="code" id="code" placeholder="Currency Code" value="{{$currency->code}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('code')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="value">Currency Value</label>
                        <input type="text" class="form-control {{$errors->first('value') ? 'border-danger' : 'border-success'}}" name="value" id="value" placeholder="Currency Value" value="{{$currency->value}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('value')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="symbol">Currency Symbol</label>
                        <input type="text" class="form-control {{$errors->first('symbol') ? 'border-danger' : 'border-success'}}" name="symbol" id="symbol" placeholder="Currency Symbol" value="{{$currency->symbol}}">
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('symbol')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="status">Currency Status</label>
                        <select name="status" id="status" class="form-control {{$errors->first('status') ? 'border-danger' : 'border-success'}}">
                            @if($currency->status == 1)
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                            @else
                            <option value="1">Active</option>
                            <option value="0" selected>Inactive</option>
                            @endif
                        </select>
                        <div class="text-danger small font-weight-bold mt-1">{{$errors->first('status')}}</div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Update Currency</button>
                    </div>
                </form>
            </div>
        </div>
		
	</div>
</div>

@endsection