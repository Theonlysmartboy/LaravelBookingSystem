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

    public function editService(Request $request, $id = null) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                Service::where(['id' => $id])->update(['s_name' => $data['product_name'],
                    'parent_id' => $data['category_id'], 'description' => $data['product_town']]);
                return redirect('/admin/view_services')->with('flash_message_success', 'Service updated Successfully');
            } else {
                $services = Service::where(['id' => $id])->first();
                $levels = Service::where(['parent_id' => 0])->get();
                return view('admin.service.edit_service')->with(compact('services', 'levels'));
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function addService(Request $request) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $service = new Service;
                $service->s_name = $data['product_name'];
                $service->parent_id = $data['category_id'];
                $service->description = $data['product_town'];
                $service->save();
                return redirect('/admin/view_services')->with('flash_message_success', 'Service Created Successfully');
            } else {
                $services = Service::where(['parent_id' => 0])->get();
                return view('admin.service.add_service')->with(compact('services'));
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function deleteService($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Service::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_message_success', 'Deleted Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
