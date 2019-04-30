@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{url('admin/accounts')}}">Accounts</a> <a href="#" class="current">Add Account</a> 
        </div>
        <h1>Add Comapny Details</h1>
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
                        <h5>Add Company Details Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/add_bank_details')}}" name="edit_account" id="edit_account" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Bank Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Branch</label>
                                <div class="controls">
                                    <input type="text" name="product_code" id="product_code" >                                                                
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Account Name</label>
                                <div class="controls">
                                    <input name="product_town" id="product_town" >                             
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Account Number</label>
                                <div class="controls">
                                    <input name="product_town_code" id="product_town_code" >                           
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pay bill Number <small style="color: #ff3333;">(Optional)</small></label>
                                <div class="controls">
                                    <input type="text" name="product_color" id="product_color" >

                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Save" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection