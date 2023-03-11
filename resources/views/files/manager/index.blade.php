@extends('layouts.master')
@section('title') All Manager @endsection
@section('pos') active show-sub @endsection
@section('manager-list') active @endsection

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <span class="breadcrumb-item active">Manager list</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Manager</div>
                @if(Session::get('delete-message'))
                    <p class="text-success pl-2">{{ Session::get('delete-message') }}</p>
                @endif
                <div class="card-body">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="wd-20p">SL</th>
                                <th class="wd-20p">Name</th>
                                <th class="wd-20p">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($manager as $data )
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->name}}</td>
                                    <td style="display: flex">
                                        <a href="{{ url('/managers/'.$data->id.'/edit') }}" class="btn btn-sm btn-primary" title="Edit"> <i class="fa fa-pencil"></i></a>
                                        <form action="{{ url('/managers/'.$data->id) }}" method="post"  class="btn btn-sm">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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
