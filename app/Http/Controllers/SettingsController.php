<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Setting;
use Session;

class SettingsController extends Controller {

    public function company(Request $request) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
            $company = new Company;
            
            } else {
                $settings = Company::get();
                return view('admin.company.company_details')->with(compact('settings'));
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
