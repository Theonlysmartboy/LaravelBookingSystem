@extends('layouts.clientLayout.client_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Addons pages</a> <a href="#" class="current">invoice</a> 
        </div>
        <h1>Invoice</h1>
    </div>
    @foreach($products as $product)
    @foreach($charges as $charge)
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
                        <h5 >Company Name</h5>
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
                                            <td class="width70"><strong>TD-6546</strong></td>
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
                                            <td>{{ $product->service_name }}</td>
                                            <td> </td>
                                            <td class="right">1</td>
                                            <td class="right">Ksh &nbsp;{{ $charge->amount }}</td>
                                            <td class="right"><strong>Ksh &nbsp;{{ $charge->amount }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-invoice-full">
                                    <tbody>
                                        <tr>
                                            <td class="msg-invoice" width="75%"><h4>Payment method: </h4>
                                                <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a></td>
                                            <td class="right"><strong>Subtotal</strong> <br>
                                                <strong>Tax ( {{ $charge->tax*100 }}%)</strong> <br>
                                                <strong>Discount</strong></td>
                                            <td class="right"><strong>Ksh &nbsp;{{ $charge->amount }} <br>
                                                     Ksh &nbsp;{{ $charge->amount*$charge->tax }}<br>
                                                    $50</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    <h4><span>Amount Due:</span>Ksh &nbsp;{{ $product->service_fee }}</h4>
                                    <br>
                                   @if($product->service_status== 'Unpaid')
                                    <a class="btn btn-danger btn-large pull-right" href="">Pay Invoice</a> </div>
                            @else
                             <a class="btn btn-success btn-large pull-right" href="">Paid</a> </div>
                            
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
</div>
@endsection