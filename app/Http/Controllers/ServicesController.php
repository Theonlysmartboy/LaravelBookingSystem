<?php

namespace App\Http\Controllers;

use Session;
use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller {

    public function viewServices() {
        if (Session::has('adminSession')) {
            $services = Service::get();
            foreach ($services as $service) {
                if ($service->parent_id == 0) {
                    $parent_id = "__";
                } else {
                    $parent_id = Service::where(['parent_id' => 0])->pluck('s_name');
                    //dd($parent_id);
                }
            }
            return view('admin.service.view_services')->with(compact('services', 'parent_id'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function deleteService() {
        if (Session::has('adminSession')) {
            
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
