@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Clients</a> <a href="#" class="current">View Clients</a> 
        </div>
        <h1>View Sessions</h1>
    </div>
    <div class="container-fluid"><hr>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_error')!!}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_success')!!}</strong>
        </div>
        @endif
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Sessions</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CLIENT NAME</th>
                                    <th>EMAIL</th>
                                    <th>TELEPHONE</th>
                                    <th>ADDRESS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allclients as $client)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $client->id }}</td>
                                    <td class="text-center">{{$client->full_name}}</td>
                                    <td class="text-center">{{ $client->email }}</td>
                                    <td class="text-center">{{ $client->telephone }}</td>
                                    <td class="text-center">{{ $client->contact_adress }}</td>
                                    <td><a href="#productModal{{ $client->id }}" data-toggle="modal" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        <a rel="{{$client->id}}" rel1="delete_client" href="javascript:" class="btn btn-danger btn-mini deleteClient">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $client->id }}" class="modal hide">
                                <div class="modal-header bg-blue-dark">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">NAME: {{ $client->full_name }}</h3>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">EMAIL: >{{ $client->email }}</p>
                                    <p class="text-center bg-primary">TELEPHONE: {{$client->telephone}}</p>
                                    <p class="text-center">ADDRESS: {{ $client->contact_address }}</p>
                                </div>
                            </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection