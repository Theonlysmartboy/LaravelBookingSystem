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
                Company::where(['id' => 1])->update(['name' => $data['product_name'], 'adress' => $data['product_code'], 'town' => $data['product_town'], 'code' => $data['product_town_code'], 'telephone' => $data['product_color'], 'email' => $description,
                    'website' => $data['product_cost']]);
                return redirect('/admin/company_settings')->with('flash_message_success', 'Product updated Successfully');
            } else {
                $settings = Company::get()->first();
                return view('admin.company.company_details')->with(compact('settings'));
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function addAccount(Request $request) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $bank = new Setting;
                $bank->bank = $data['product_name'];
                $bank->branch = $data['product_code'];
                $bank->name = $data['product_town'];
                $bank->account_no = $data['product_town_code'];
                $bank->paybill_no = $data['product_color'];
                $bank->is_current = 2;
                $bank->save();
                return redirect('/admin/accounts')->with('flash_message_success', 'Account Created Successfully');
            }
            return view('admin.company.add_bank_details');
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function viewAccounts() {
        if (Session::has('adminSession')) {
            $banksettings = Setting::get();
            return view('admin.company.view_bank_details')->with(compact('banksettings'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function deleteAccount($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Setting::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_message_success', 'Deleted Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function enable($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Setting::where(['id' => $id])->update(['is_current' => 1]);
                return redirect()->back()->with('flash_message_success', 'Enabled Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function disable($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Setting::where(['id' => $id])->update(['is_current' => 2]);
                return redirect()->back()->with('flash_message_success', 'Disabled Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function editAccount(Request $request, $id = null) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                Setting::where(['id' => $id])->update(['bank' => $data['product_name'],
                    'branch' => $data['product_code'], 'name' => $data['product_town'],
                    'account_no' => $data['product_town_code'], 'paybill_no' => $data['product_color']]);
                return redirect('/admin/accounts')->with('flash_message_success', 'Account updated Successfully');
            } else {
                $settings = Setting::where(['id' => $id])->first();
                return view('admin.company.edit_bank_details')->with(compact('settings'));
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
