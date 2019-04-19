@extends('layouts.clientLayout.client_design')
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
                <li class="bg_lb"> <a href="{{url('admin/dashboard')}}"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                <li class="bg_lo"> <a href="widgets.html"> <i class="icon icon-th-list"></i><span class="label label-success">101</span> Sessions </a> </li>
                <li class="bg_ls"> <a href="widgets.html"> <i class="icon-icon-invoice"></i><span class="label label-success">101</span> Invoices </a> </li>
                <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
            </ul>
        </div>
        <!--End-Action boxes-->    
        <hr/>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                        <h5>Progress Box</h5>
                    </div>
                    <div class="widget-content">
                        <ul class="unstyled">
                            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 81% successful sessions <span class="pull-right strong">567</span>
                                <div class="progress progress-striped ">
                                    <div style="width: 81%;" class="bar"></div>
                                </div>
                            </li>
                            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 72% Cancelled sessions <span class="pull-right strong">507</span>
                                <div class="progress progress-success progress-striped ">
                                    <div style="width: 72%;" class="bar"></div>
                                </div>
                            </li>
                            <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span> 53% pending sessions <span class="pull-right strong">457</span>
                                <div class="progress progress-warning progress-striped ">
                                    <div style="width: 53%;" class="bar"></div>
                                </div>
                            </li>
                            <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 3% Paid invoices <span class="pull-right strong">8</span>
                                <div class="progress progress-danger progress-striped ">
                                    <div style="width: 3%;" class="bar"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box widget-chat">
                    <div class="widget-title bg_lb"> <span class="icon"> <i class="icon-comment"></i> </span>
                        <h5>Chat Option</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG4">
                        <div class="chat-users panel-right2">
                            <div class="panel-title">
                                <h5>Online Users</h5>
                            </div>
                            <div class="panel-content nopadding">
                                <ul class="contact-list">
                                    <li id="user-Alex" class="online"><a href=""><img alt="" src="{{asset('images/backend_images/demo/av1.jpg')}}" /> <span>Alex</span></a></li>
                                    <li id="user-Linda"><a href=""><img alt="" src="{{asset('images/backend_images/demo/av2.jpg')}}" /> <span>Linda</span></a></li>
                                    <li id="user-John" class="online new"><a href=""><img alt="" src="{{asset('images/backend_images/demo/av3.jpg')}}" /> <span>John</span></a><span class="msg-count badge badge-info">3</span></li>
                                    <li id="user-Mark" class="online"><a href=""><img alt="" src="{{asset('images/backend_images/demo/av4.jpg')}}" /> <span>Mark</span></a></li>
                                    <li id="user-Maxi" class="online"><a href=""><img alt="" src="{{asset('images/backend_images/demo/av5.jpg')}}" /> <span>Maxi</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chat-content panel-left2">
                            <div class="chat-messages" id="chat-messages">
                                <div id="chat-messages-inner"></div>
                            </div>
                            <div class="chat-message well">
                                <button class="btn btn-success">Send</button>
                                <span class="input-box">
                                    <input type="text" name="msg-box" id="msg-box" />
                                </span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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