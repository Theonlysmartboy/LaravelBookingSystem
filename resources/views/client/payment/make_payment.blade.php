@extends('layouts.clientLayout.client_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Make Payments</a> <a href="#" class="current">Book</a> 
        </div>
        <h1>Pay</h1>
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
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Make Payment</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <p class="text-black text-center">Currently payments can only be made through:</p>
                        <ol class="text-black text-center">
                            @foreach($settings as $setting)
                            @if($settings->bank == 'Mpesa')
                            <li class="text-black text-center">{{ $setting->bank }}<br>
                                Paybill No: {{ $setting->account_no }} <br>
                                Account no: {{ $setting->branch }} <br></li>
                            @endif
                            <li class="text-black text-center">our {{ $setting->bank }} bank account<br>
                                Account No: {{ $setting->account_no }} <br>
                                Account Name: {{ $setting->name }} <br>
                                Branch: {{ $setting->branch }} <br></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection