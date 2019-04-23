@extends('layouts.clientLayout.client_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Addons pages</a> <a href="#" class="current">invoice</a> 
        </div>
        <h1>My Invoices</h1>
    </div>
    @foreach($products as $product)

    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
                        <h5 >Invoice</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">
                            <div class="span6">
                                <table class="">
                                    <tbody>
                                        <tr>
                                            <td><h4>ALPHA PHOTOGRAPHY</h4></td>
                                        </tr>
                                        <tr>
                                            <td>Your Town</td>
                                        </tr>
                                        <tr>
                                            <td>Your Region/State</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Phone: +4530422244</td>
                                        </tr>
                                        <tr>
                                            <td >info@alpgaphotography.co.ke</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="span6">
                                <table class="table table-bordered table-invoice">
                                    <tbody>
                                        <tr>
                                        <tr>
                                            <td class="width30">Invoice ID:</td>
                                            <td class="width70"><strong>{{ $product->invoice }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Issue Date:</td>
                                            <td><strong>{{ $product->startdatetime }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Due Date:</td>
                                            <td><strong>{{ $product->enddatetime }}</strong></td>
                                        </tr>
                                    <td class="width30">Client Address:</td>
                                    <td class="width70"><strong>{{ Auth::user()->full_name }}</strong> <br>
                                        {{ $product->adress }}<br>
                                        {{ $product->town }} &nbsp; {{ $product->county }} &nbsp; County <br>
                                        Contact No: {{ Auth::user()->telephone }} <br>
                                        Email: {{ Auth::user()->email }} </td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-bordered table-invoice-full">
                                    <thead>
                                        <tr>
                                            <th class="head0">Type</th>
                                            <th class="head1">Desc</th>
                                            <th class="head0 right">Qty</th>
                                            <th class="head1 right">Price</th>
                                            <th class="head0 right">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $product->s_name }}</td>
                                            <td> </td>
                                            <td class="right">1</td>
                                            <td class="right">Ksh &nbsp;{{ $product->amount }}</td>

                                            <td class="right"><strong>Ksh &nbsp;{{ $product->amount }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-invoice-full">
                                    <tbody>
                                        <tr>
                                            <td class="msg-invoice" width="75%"><h4>Payment method: </h4>
                                                <a href="#" class="tip-bottom" title="Wire Transfer">Cash in hand</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">Mpesa </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">Cheque </a></td>
                                            <td class="right"><strong>Subtotal</strong> <br>
                                                <strong>Tax ( {{ $product->tax*100 }}%)</strong> <br>
                                                <strong>Discount</strong></td>
                                            <td class="right"><strong>Ksh &nbsp;{{ $product->amount }} <br>
                                                    Ksh &nbsp;{{ $product->amount*$product->tax }}<br>
                                                    ksh {{$product->discount}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    <h4><span>Amount Due:</span>Ksh &nbsp;{{ $product->total - $product->discount }}</h4>
                                    <br>
                                    @if($product->name== 'Unpaid')
                                    <a class="btn btn-danger btn-large pull-right" href="{{url('client/make_payment/'.$product->id)}}">Pay Invoice</a> </div>
                                @else
                                <a class="btn btn-success btn-large pull-right" href="">Paid</a> </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


<!--/div-->
@endsection