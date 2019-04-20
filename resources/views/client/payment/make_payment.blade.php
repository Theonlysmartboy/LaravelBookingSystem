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
                        <h2 class="text-black text-center">Currently payments can only be made through:</h2>
                        <ol class="text-black">
                            @foreach($settings as $setting)
                            @if($setting->bank == 'Mpesa')
                            <li class="text-black"><u> <b>{{ $setting->bank }}</b></u><br>
                                Paybill No: <u> <b>{{ $setting->account_no }}</b></u> <br>
                                Account no: <u> <b>{{ $setting->branch }}</b></u> <br></li>
                            @else
                            <li class="text-black">our <u> <b>{{ $setting->bank }}</b></u> bank account<br>
                                Account No: <u> <b>{{ $setting->account_no }}</b></u> <br>
                                Account Name: <u> <b>{{ $setting->name }}</b></u> <br>
                                Branch: <u> <b>{{ $setting->branch }}</b></u> <br></li>
                            @endif
                            @endforeach
                            <li>Cash in hand at our offices or during the meeting</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection