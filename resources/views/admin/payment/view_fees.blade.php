@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{url('admin/add_payment')}}" >New Charge</a> <a href="" class="current">View Charges</a>
        </div>
        <h1>View Charges</h1>
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
                                    <th>SERVICE</th>
                                    <th>AMOUNT (KSH)</th>
                                    <th>TAX (%)</th>
                                    <th>TOTAL (KSH)</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($charges as $charge)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $charge->id }}</td>
                                    <td class="text-center">{{ $charge->name }}</td>
                                    <td class="text-center">{{ $charge->s_name }}</td>
                                    <td class="text-center">{{ $charge->amount }}</td>
                                    <td class="text-center">{{ $charge->tax *100 }}</td>
                                    <td class="text-center">{{ $charge->total }}</td>
                                    <td><a href="#productModal{{ $charge->id }}" data-toggle="modal" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        <a href="{{url('admin/edit_payment/'.$charge->id)}}" class="btn btn-primary btn-mini">Edit <i class="icon icon-edit"></i></a> | 
                                        <a rel="{{$charge->id}}" rel1="delete_payment" href="javascript:" class="btn btn-danger btn-mini deletePayment">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $charge->id }}" class="modal hide">
                                <div class="modal-header bg-primary">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">{{ $charge->name}}</h3>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">SERVICE: >{{ $charge->s_name }}</p>
                                    <p class="text-center bg-primary">AMOUNT: Ksh &nbsp; {{$charge->amount}}</p>
                                    <p class="text-center">TAX: {{ $charge->tax *100 }} &nbsp;%</p>
                                    <p class="text-center">TOTAL: Ksh &nbsp;{{$charge->total}}</p>
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
