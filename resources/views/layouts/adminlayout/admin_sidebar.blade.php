<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Services</span></a>
            <ul>
                <li><a href="{{url('admin/view_categories')}}"><i class="icon icon-th-list"></i> <span>View Services</span></a></li>
                <li><a href="{{url('admin/add_category')}}"><i class="icon icon-plus-sign"></i><span>Add Service</span></a></li>
            </ul>
        </li>
        <li class="submenu"> <a href=""><i class="icon icon-th-list"></i> <span>Clients</span></a>
            <ul>
                <li><a href="{{url('admin/view_products')}}"><i class="icon icon-th-list"></i> <span>View Clients</span></a></li>
                <li><a href="{{url('admin/Manage_clients')}}"><i class="icon icon-plus-sign"></i><span>Manage Clients</span></a></li>
            </ul>
        </li>
        <li class="submenu"><a href="" ><i class="icon icon-tint"></i> <span>Accounts</span></a>
            <ul>
                <li class="submenu"><a href="{{url('admin/view_invoice')}}"><i class="icon icon-th-list"></i> <span>Invoices</span></a></li>
                <li class="submenu"><a href="{{url('admin/manage_invoice')}}"><i class="icon icon-plus-sign"></i><span>Bank Accounts</span></a></li>
            </ul>
        </li>
        <li><a href="{{url('admin/company_Settings')}}"><i class="icon icon-cog"></i> <span>Settings</span></a></li>
    </ul>
</div>
<!--sidebar-menu-->