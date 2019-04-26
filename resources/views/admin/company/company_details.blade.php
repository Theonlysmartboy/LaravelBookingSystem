@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Company</a> <a href="#" class="current">Settings</a> 
        </div>
        <h1>Company Details</h1>
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
                        <h5>Edit Company Details Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/company_settings/')}}" name="edit_product" id="edit_product" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name" value="{{$settings->name}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea rows="4" cols="50" name="product_code" id="product_code">{{$settings->adress}}
                                    </textarea>                                
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Town</label>
                                <div class="controls">
                                    <input type="text" name="product_town" id="product_town" value="{{$settings->town}}">                             
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Postal Code</label>
                                <div class="controls">
                                    <input type="text" name="product_town_code" id="product_town_code" value="{{$settings->code}}">                           
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telephone</label>
                                <div class="controls">
                                    <input type="text" name="product_color" id="product_color" value="{{$settings->telephone}}">

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" name="product_desc" id="product_desc" value="{{$settings->email}}">
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Website</label>
                                <div class="controls">
                                    <input type="text" name="product_cost" id="product_cost" value="{{$settings->website}}">
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