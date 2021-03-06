@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{url('admin/view_services')}}">Services</a> <a href="#" class="current">Edit Services</a> 
        </div>
        <h1>Edit Services</h1>
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
                        <h5>Edit Service Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/edit_service/'.$services->id)}}" name="edit_account" id="edit_account" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Service Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name" value="{{$services->s_name}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Parent Service</label>
                                <div class="controls">
                                    <select name="category_id" style="width: 220px;">
                                        <option value="0">Parent</option>
                                        @foreach($levels as $level)
                                        <option value="{{$level->id}}" @if($level->id == $services->parent_id)
                                                selected @endif>{{$level->s_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <input type="text" name="product_town" id="product_town" value="{{$services->description}}">                             
                                </div>
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