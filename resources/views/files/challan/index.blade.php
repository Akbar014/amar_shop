@extends('layouts.master')
@section('title') Add challan @endsection
@section('pos') active show-sub @endsection
@section('challan-list') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <span class="breadcrumb-item active">challan list</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card">
                @if(Session::get('delete-message'))
                    <p class="text-success pl-2">{{ Session::get('delete-message') }}</p>
                @endif
                <div class="card-body">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Create Date</th>
                                <th>Customer Name/Number</th>
                                <th>Driver Name</th>
                                <th>Edit</th>
                                <th>Print</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $i = 1)
                            @foreach($sales as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->created_at->format('d.m.y') }}</td>
                                    <td>{{ $item->c_name }}/{{ $item->c_number }}</td>
                                    <td>{{ $item->driver }}</td>
                                    <td><a href="{{ url('/challan-edit/'.$item->id) }}"><i class="fa fa-pencil text-info"></i></a></td>
                                    <td><a href="{{ url('/challan-print/'.$item->id) }}"><i class="fa fa-print text-success"></i></a></td>
                                    <td><a href="{{ url('/challan-remove', ['id'=>$item->id]) }}"><i class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

