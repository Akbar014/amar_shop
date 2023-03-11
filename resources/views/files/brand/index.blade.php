@extends('layouts.master')
@section('title') Brands @endsection
@section('pos') active show-sub @endsection
@section('brand') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <span class="breadcrumb-item active">Brands</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">Brand</div>
                        @if(Session::get('delete-message'))
                            <p class="text-success pl-3">{{ Session::get('delete-message') }}</p>
                        @endif
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-50p">Name</th>
                                        <th class="wd-30p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>
                                                {{ $brand->name }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/brand-remove', ['id'=>$brand->id]) }}" class="btn btn-sm btn-outline-danger" title="Delete"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Add new brand</div>
                        @if(Session::get('message'))
                            <p class="text-success pl-3">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Brand name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" required />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Add Brand</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
