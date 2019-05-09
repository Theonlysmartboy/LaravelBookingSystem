@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{url('')}}" >Service</a> <a href="" class="current">View Services</a>
        </div>
        <h1>View Services</h1>
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
                        <h5>Accounts</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>PARENT</th>
                                    <th>DESCRIPTION</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $service->id }}</td>
                                    <td class="text-center">{{ $service->s_name }}</td>
                                    @if($service->parent_id==0)
                                    <td class="text-center">__</td>
                                    @else
                                    @if($service->parent_id==1)
                                    <td class="text-center">{{ $parent_id[0]}}</td>
                                    @else
                                    <td class="text-center">{{ $parent_id[1]}}</td>
                                    @endif
                                    @endif
                                    <td class="text-center">{{ $service->description }}</td>
                                    <td><a href="#productModal{{ $service->id }}" data-toggle="modal" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        <a href="{{url('admin/edit_service/'.$service->id)}}" class="btn btn-primary btn-mini">Edit <i class="icon icon-edit"></i></a> | 
                                        <a rel="{{$service->id}}" rel1="delete_service" href="javascript:" class="btn btn-danger btn-mini deleteService">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $service->id }}" class="modal hide">
                                <div class="modal-header bg-primary">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">{{ $service->s_name}}</h3>
                                </div>
                                <div class="modal-body">
                                     @if($service->parent_id==0)
                                    <p class="text-center">PARENT: __</p>
                                    @else
                                    @if($service->parent_id==1)
                                    <p class="text-center">PARENT: {{ $parent_id[0]}}</p>
                                    @else
                                    <p class="text-center">PARENT: {{ $parent_id[1]}}</p>
                                    @endif
                                    @endif
                                    <p class="text-center bg-primary">DESCRIPTION: {{$service->description}}</p>
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
