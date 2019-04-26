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
                                    <th>BANK</th>
                                    <th>BRANCH</th>
                                    <th>ACCOUNT NAME</th>
                                    <th>ACCOUNT NO</th>
                                    <th>PAYBILL NO</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banksettings as $setting)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $setting->id }}</td>
                                    <td class="text-center">{{ $setting->bank }}</td>
                                    <td class="text-center">{{ $setting->branch }}</td>
                                    <td class="text-center">{{ $setting->name }}</td>
                                    <td class="text-center">{{ $setting->account_no }}</td>
                                    <td class="text-center">{{ $setting->paybill_no }}</td>
                                    <td class="text-center">
                                        @if($setting->is_current == 1)
                                        Active
                                        @else
                                        Not active
                                        @endif
                                    </td>
                                    <td><a href="#productModal{{ $setting->id }}" data-toggle="modal" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        <a href="{{url('admin/edit_bank_details/'.$setting->id)}}" class="btn btn-primary btn-mini">Edit <i class="icon icon-edit"></i></a> | 
                                        @if($setting->is_current == 2)
                                        <a href="{{url('admin/enable/'.$setting->id)}}" class="btn btn-warning btn-mini">Activate <i class="icon icon-edit"></i></a>
                                        @else
                                        <a href="{{url('admin/disable/'.$setting->id)}}" class="btn btn-warning btn-mini">Disable <i class="icon icon-edit"></i></a>
                                        @endif
                                        <a rel="{{$setting->id}}" rel1="delete_bank_details" href="javascript:" class="btn btn-danger btn-mini deleteAccount">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $setting->id }}" class="modal hide">
                                <div class="modal-header bg-blue-dark">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">Session: {{ $setting->service_name }}</h3>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">START: >{{ $setting->startdatetime }}</p>
                                    <p class="text-center bg-primary">END: {{$setting->enddatetime}}</p>
                                    <p class="text-center">LOCATION: {{ $setting->town }} &nbsp; {{ $setting->county }} &nbsp; County</p>
                                    <p class="text-center">PRICE: Ksh &nbsp;{{$setting->service_fee}}</p>
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