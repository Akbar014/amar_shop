@extends('layouts.master')
@section('title') Home @endsection
@section('dashboard') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                            <span href="#" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></span>
                        </div>
                        <!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $todaySale }}</h3>
                        </div>
                    </div>
                    <!-- card -->
                </div>
                
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-success">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Monthly Sales</h6>
                            <span href="#" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></span>
                        </div>
                        <!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{number_format($monthSale)}}</h3>
                        </div>
                    </div>
                    <!-- card -->
                </div>
                
                
                <!-- col-3 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-warning">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Yearly Sales</h6>
                            <a href="{{ route('show.sale') }}" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                        <!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ number_format($yearlySale) }}</h3>
                        </div>
                    </div>
                    <!-- card -->
                </div>
                <!-- col-3 -->
                
                <!-- col-3 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-secondary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sales</h6>
                            <a href="{{ route('show.sale') }}" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                        <!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ number_format($totalSale) }}</h3>
                        </div>
                    </div>
                    <!-- card -->
                </div>
                <!-- col-3 -->
                
            </div>
            <!-- row -->
        </div>
        <!-- sl-pagebody -->
    </div>
@endsection
