@extends('layouts.master')
@section('title') Add product @endsection
@section('pos') active show-sub @endsection
@section('customer-create') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <a class="breadcrumb-item" href="{{ url('/products') }}">Customer list</a>
            <span class="breadcrumb-item active">Add Customer</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/customers/'.$data->id) }}" method="POST">
                    @csrf
                    <div class="row row-sm">
                        

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Customer Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{$customer->name}}"required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Customer Phone: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="number" name="phone"value="{{$customer->phone}}" required />
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Customer Email: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{$customer->email}}" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Customer Address <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="{{$customer->address}}" required />
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Customer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
