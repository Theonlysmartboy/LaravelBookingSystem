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
                $parentid = Service::where(['parent_id' => 0])->get();
                //dd($parentid);
                foreach ($parentid as $parent) {
                    if ($parent->parent_id > 0) {
                        $parent_id = "<td class='text-center'>__</td>";
                    } else {
                        $parent_id = " <td class='text-center'>" . $parentid->s_name . "</td>";
                    }
                }
            }
            return view('admin.service.view_services')->with(compact('services', 'parent_id'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
