<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;

class ClientController extends Controller {

    public function viewClients() {
        if (Session::has('adminSession')) {
            $allclients = User::where(['role' => 0])->get();
            return view('admin.client.view_clients')->with(compact('allclients'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function deleteClient($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                User::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_message_success', 'Deleted Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
