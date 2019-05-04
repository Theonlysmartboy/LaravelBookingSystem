@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{url('admin/add_bank_details')}}" >Add Accounts</a> <a href="" class="current">View Accounts</a>
        </div>
        <h1>View Bank Accounts</h1>
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
                                    <th>CLIENT</th>
                                    <th>INVOICE NO</th>
                                    <th>DATE</th>
                                    <th>SERVICE</th>
                                    <th>AMOUNT</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $invoice->id }}</td>
                                    <td class="text-center">{{ $invoice->uname }}</td>
                                    <td class="text-center">{{ $invoice->invoice }}</td>
                                    <td class="text-center">{{ $invoice->startdatetime }}</td>
                                    <td class="text-center">{{ $invoice->s_name }}</td>
                                    <td class="text-center">{{ $invoice->total }}</td>
                                    <td class="text-center">{{ $invoice->status }}</td>
                                    <td><a href="#productModal{{ $invoice->id }}" data-toggle="modal" class="btn btn-success btn-mini">Add PAYMENT <i class="icon icon-eye-open"></i></a> | 
                                        <a rel="{{$invoice->id}}" rel1="delete_bank_details" href="javascript:" class="btn btn-danger btn-mini deleteAccount">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $invoice->id }}" class="modal hide">
                                <div class="modal-header bg-blue-dark">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">id: {{ $invoice->id }}</h3>
                                </div>
                                <div class="modal-body">

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

