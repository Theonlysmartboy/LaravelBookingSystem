@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Sessions</a> <a href="#" class="current">View Sessions</a> 
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
                                    <th>CLIENT</th>
                                    <th>Service</th>
                                    <th>START DATE</th>
                                    <th>END DATE</th>
                                    <th>LOCATION</th>
                                    <th>COST</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-center">{{$product->client}}</td>
                                    <td class="text-center">{{ $product->service_name }}</td>
                                    <td class="text-center">{{ $product->startdatetime }}</td>
                                    <td class="text-center">{{ $product->enddatetime }}</td>
                                    <td class="text-center">{{ $product->town }} &nbsp; {{ $product->county }} &nbsp; County</td>
                                    <td class="text-center">Ksh &nbsp;{{ $product->service_fee }}</td>
                                    <td class="text-center">
                                        {{ $product->service_status }}
                                    </td>
                                    <td><a href="#productModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        @if($product->status==1)
                                        <a href="{{url('admin/accept_booking/'.$product->id)}}" class="btn btn-primary btn-mini">Accept <i class="icon icon-edit"></i></a> | 
                                        <a href="{{url('admin/reject_booking/'.$product->id)}}" class="btn btn-warning btn-mini">Reject <i class="icon icon-edit"></i></a> | 
                                        @endif
                                        <a rel="{{$product->id}}" rel1="delete_booking" href="javascript:" class="btn btn-danger btn-mini deleteBooking">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $product->id }}" class="modal hide">
                                <div class="modal-header bg-blue-dark">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">Session: {{ $product->service_name }}</h3>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">START: >{{ $product->startdatetime }}</p>
                                    <p class="text-center bg-primary">END: {{$product->enddatetime}}</p>
                                    <p class="text-center">LOCATION: {{ $product->town }} &nbsp; {{ $product->county }} &nbsp; County</p>
                                    <p class="text-center">PRICE: Ksh &nbsp;{{$product->service_fee}}</p>
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