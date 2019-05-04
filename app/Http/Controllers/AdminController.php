<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Booking;
use App\Invoice;
use App\Service;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->input();
            //Attempt to login
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => '1'])) {
                //Load the admin dashboard
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard')->with('flash_message_success', 'Login Successfull');
            } else if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => '0'])) {
                echo "Login Successfull for User";
                die;
            } else {
                return redirect('/admin')->with('flash_message_error', 'Invalid Email Or password');
            }
        } elseif (Session::has('adminSession')) {
            return redirect('/admin/dashboard')->with('flash_message_success', 'Login Successfull');
        }
        return view('admin.admin_login');
    }

    public function dashboard() {
        if (Session::has('adminSession')) {
            $total_bookings = Booking::count();
            $pending_bookings = Booking::where(['status' => 1])->count();
            $total_clients = User::where(['role' => 0])->count();
            $new_clients = User::where(['role' => 0])->count();
            $total_invoices = Invoice::count();
            $total_services = Service::count();
            $total_fee = Booking::select(DB::raw('SUM(charges.total) As revenue'))
                            ->leftJoin('charges', 'bookings.charge', '=', 'charges.id')->first();
            $total_paid = Booking::select(DB::raw('SUM(charges.total) As paid'))
                            ->leftJoin('charges', 'bookings.charge', '=', 'charges.id')
            ->where('bookings.status','4')->first();
            
            return view('admin.dashboard')->with(compact('total_bookings', 'pending_bookings', 'total_clients', 'new_clients', 'total_invoices', 'total_services', 'total_fee','total_paid'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function settings() {
        if (Session::has('adminSession')) {
            return view('admin.settings');
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function chkPassword(Request $request) {
        if (Session::has('adminSession')) {
            $data = $request->all();
            $current_password = $data['current_pwd'];
            $check_password = User::where(['role' => '1'])->first();
            if (Hash::check($current_password, $check_password->password)) {
                echo "true";
                die;
            } else {
                echo "false";
                die;
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function updatePassword(Request $request) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $check_password = User::where(['email' => Auth::user()->email])->first();
                $current_password = $data['current_pwd'];
                $email = Auth::user()->email;
                Hash::check($current_password, $check_password->password);
                $password = bcrypt($data['new_pwd']);
                User::where('email', $email)->update(['password' => $password]);
                Session::flush();
                return redirect('/admin')->with('flash_message_success', 'Password Updated Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logged out Successfully');
    }

}
