<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class InvoicesController extends Controller {

    public function viewInvoices() {
        if (Session::has('adminSession')) {
            $invoices = DB::table('bookings')
                    ->join('users', 'bookings.client', '=', 'users.id')
                    ->join('services', 'bookings.service', '=', 'services.id')
                    ->join('charges', 'bookings.charge', '=', 'charges.id')
                    ->join('statuses', 'bookings.status', '=', 'statuses.id')
                    ->select('bookings.*','users.name As uname', 'services.s_name', 'services.description', 'statuses.name as status', 'charges.amount', 'charges.tax', 'charges.total')
                    ->get();
                       return view('admin.invoice.view_invoices')->with(compact('invoices'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
