@extends('layouts.clientLayout.client_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Addons pages</a> <a href="#" class="current">invoice</a> </div>
        <h1>Invoice</h1>
    </div>
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
                                            <td><strong>March 23, 2013</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Due Date:</td>
                                            <td><strong>April 01, 2013</strong></td>
                                        </tr>
                                    <td class="width30">Client Address:</td>
                                    <td class="width70"><strong>Cliente Company name.</strong> <br>
                                        501 Mafia Street., washington, <br>
                                        NYNC 3654 <br>
                                        Contact No: 123 456-7890 <br>
                                        Email: youremail@companyname.com </td>
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
                                            <td>Netscape Template</td>
                                            <td>Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</td>
                                            <td class="right">5</td>
                                            <td class="right">$50</td>
                                            <td class="right"><strong>$250</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-invoice-full">
                                    <tbody>
                                        <tr>
                                            <td class="msg-invoice" width="85%"><h4>Payment method: </h4>
                                                <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a></td>
                                            <td class="right"><strong>Subtotal</strong> <br>
                                                <strong>Tax (5%)</strong> <br>
                                                <strong>Discount</strong></td>
                                            <td class="right"><strong>$7,000 <br>
                                                    $600 <br>
                                                    $50</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    <h4><span>Amount Due:</span> $7,650.00</h4>
                                    <br>
                                    <a class="btn btn-primary btn-large pull-right" href="">Pay Invoice</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection