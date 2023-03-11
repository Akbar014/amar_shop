


@extends('layouts.master')
@section('title') Sale list @endsection
@section('pos') active show-sub @endsection
@section('sale-list') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <span class="breadcrumb-item active">Sale list</span>
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
                                <th>Customer Name/Number/Email</th>
                                <th>Total Amount</th>
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
                                    <td>{{ $item->c_name }}/{{ $item->c_number }}/{{ $item->c_email }}</td>
                                    <td>{{ $item->total_amount }}</td>
                                    <td><a href="{{ url('/sale-edit/'.$item->id) }}"><i class="fa fa-pencil text-info"></i></a></td>
                                    <td><a href="{{ url('/sale-print/'.$item->id) }}"><i class="fa fa-print text-success"></i></a></td>
                                    <td><a href="{{ url('/sale-remove', ['id'=>$item->id]) }}"><i class="fa fa-trash text-danger"></i></a></td>
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

