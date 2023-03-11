@extends('layouts.master')
@section('title') Add product @endsection
@section('pos') active show-sub @endsection
@section('product-create') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <a class="breadcrumb-item" href="{{ url('/products') }}">Product list</a>
            <span class="breadcrumb-item active">Add product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/products') }}" method="POST">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Product name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter product name" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product model: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="model" placeholder="Enter product model" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Capacity: <span class="tx-danger"></span></label>
                                        <input class="form-control" type="text" name="capacity" placeholder="Enter product capacity"  />
                                        @error('price')
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
                                        <label class="form-control-label">Product color: <span class="tx-danger"></span></label>
                                        <input class="form-control" type="text" name="color" placeholder="Enter product color"  />
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Unit: <span class="tx-danger"></span></label>
                                        <input class="form-control" type="text" name="unit" placeholder="Enter product unit"  />
                                        @error('price')
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
                                        <label class="form-control-label">Product price: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="number" name="price" placeholder="Enter product price" required />
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Select category: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One" name="brand_id" required>
                                            <option label="Choose one"></option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
