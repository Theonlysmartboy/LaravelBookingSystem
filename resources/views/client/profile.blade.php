@extends('layouts.clientLayout.client_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#" class="current">Profile</a> 
        </div>
        <h1>Update Profile</h1>
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
                        <h5>Update Profile Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/update_profile')}}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Full Name </label>
                                <div class="controls">
                                    <input type="text" id="fname" name="fname">
                                </div>
                            </div>                                                                      
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea name="adress" id="adress"></textarea>
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Telephone</label>
                                <div class="controls">
                                    <input type="text" name="tel" id="tel">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection