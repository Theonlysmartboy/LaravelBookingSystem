@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_success')!!}</strong>
        </div>
        @endif
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb"> <a href="{{url('admin/dashboard')}}"> <i class="icon-dashboard"></i>My Dashboard </a> </li>
                <li class="bg_lg span3"> <a href="{{url('admin/clients')}}"> <i class="icon-signal"></i> <strong>{{ $total_clients }} Clients </strong></a> </li>
                <li class="bg_ly"> <a href="{{url('admin/bookings')}}"> <i class="icon-inbox"></i><strong>{{ $total_bookings }} Bookings</strong> </a> </li>
                <li class="bg_lo"> <a href="{{url('admin/invoices')}}"> <i class="icon-th"></i> <strong>{{ $total_invoices }} Invoices</strong></a> </li>
                <li class="bg_ls"> <a href="{{url('admin/services')}}"> <i class="icon-fullscreen"></i> <strong>{{ $total_services }} Services</strong></a> </li>
                  </ul>
        </div>
        <!--End-Action boxes-->    
        <!--Chart-box-->    
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                    <h5>Site Analytics</h5>
                </div>
                <div class="widget-content" >
                    <div class="row-fluid">
                        <div class="span9">
                            <div class="chart"></div>
                        </div>
                        <div class="span3">
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="icon-user"></i> <strong>{{ $total_clients }}</strong> <small>Total Clients</small></li>
                                <li class="bg_lh"><i class="icon-plus"></i> <strong>{{$new_clients}} </strong> <small>New Clients </small></li>
                                <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $total_bookings }} </strong> <small>Total Bookings</small></li>
                                <li class="bg_lh"><i class="icon-repeat"></i> <strong>{{ $pending_bookings }} </strong> <small>Pending Bookings</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Chart-box--> 
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box widget-calendar">
                    <div class="widget-title"> <span class="icon"><i class="icon-calendar"></i></span>
                        <h5>Calendar</h5>
                        <div class="buttons"> <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> Add new event</a>
                            <div class="modal hide" id="modal-add-event">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h3>Add a new event</h3>
                                </div>
                                <div class="modal-body">
                                    <p>Enter event name:</p>
                                    <p>
                                        <input id="event-name" type="text" />
                                    </p>
                                </div>
                                <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal">Cancel</a> <a href="#" id="add-event-submit" class="btn btn-primary">Add event</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="panel-left">
                            <div id="fullcalendar"></div>
                        </div>
                        <div id="external-events" class="panel-right">
                            <div class="panel-title">
                                <h5>Drag Events to the calander</h5>
                            </div>
                            <div class="panel-content">
                                <div class="external-event ui-draggable label label-inverse">My Event 1</div>
                                <div class="external-event ui-draggable label label-inverse">My Event 2</div>
                                <div class="external-event ui-draggable label label-inverse">My Event 3</div>
                                <div class="external-event ui-draggable label label-inverse">My Event 4</div>
                                <div class="external-event ui-draggable label label-inverse">My Event 5</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection