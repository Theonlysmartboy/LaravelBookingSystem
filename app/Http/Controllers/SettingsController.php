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
                if (!empty($data['product_desc'])) {
                    $description = $data['product_desc'];
                } else {
                    $description = '_';
                }
                Company::where(['id' => 1])->update(['name' => $data['product_name'], 'adress' => $data['product_code'], 'town'=>$data['product_town'], 'code'=>$data['product_town_code'], 'telephone' => $data['product_color'], 'email' => $description,
                    'website' => $data['product_cost']]);
                return redirect('/admin/company_settings')->with('flash_message_success', 'Product updated Successfully');
            } else {
                $settings = Company::get()->first();
                //dd($settings);
                return view('admin.company.company_details')->with(compact('settings'));
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
