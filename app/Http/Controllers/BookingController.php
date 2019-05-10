<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Charge;
use App\Service;
use App\Booking;
use App\Status;
use App\Setting;
use PDF;
use DB;
use App\Company;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller {

    public function book(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $product = new Booking;
            $product->client = Auth::user()->id;
            $product->service = $data['category_id'];
            $product->startdatetime = $data['startdate'];
            $product->enddatetime = $data['enddate'];
            $product->county = $data['county'];
            $product->town = $data['town'];
            if (!empty($data['adress'])) {
                $product->adress = $data['adress'];
            } else {
                $product->adress = '_';
            }
            if (!empty($data['category_id'])) {
                $product->charge = Charge::where('service', $data['category_id'])->first()->id;
            }
            $product->status = 1;
            $product->invoice = 'APP' . rand(0, 9999) . 'IN';
            $product->discount = 0;
            $product->save();
            return redirect('/client/view_bookings')->with('flash_message_success', 'Product added Successfully');
        } else {
//Services drop down start
            $services = Service::where(['parent_id' => 0])->get();
            $categories_dropdown = "<option selected>Select</option>";
            foreach ($services as $cat) {
                $categories_dropdown .= "<option class='bg-ready' value='" . $cat->id . "'>" . $cat->s_name . "</option>";
                $sub_categories = Service::where(['parent_id' => $cat->id])->get();
                foreach ($sub_categories as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->s_name . "</option>";
                }
            }
//Services dropdown end
            return view('client.booking.add_booking')->with(compact('categories_dropdown'));
        }
    }

    public function viewAllBookings() {
        if (Session::has('adminSession')) {
            $products = DB::table('bookings')
                    ->join('users', 'bookings.client', 'users.id')
                    ->join('services', 'bookings.service', '=', 'services.id')
                    ->join('charges', 'bookings.charge', '=', 'charges.id')
                    ->join('statuses', 'bookings.status', '=', 'statuses.id')
                    ->select('bookings.*', 'users.name As uname', 'services.s_name', 'services.description', 'statuses.name', 'charges.amount', 'charges.tax', 'charges.total')
                    ->get();
            return view('admin.booking.view_bookings')->with(compact('products'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function acceptBooking($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Booking::where(['id' => $id])->update(['status' => 3]);
                return redirect()->back()->with('flash_message_success', 'Status changed Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function rejectBooking($id = null) {
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Booking::where(['id' => $id])->update(['status' => 7]);
                return redirect()->back()->with('flash_message_success', 'Status changed Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

//Function to dosplay the bookings
    public function viewBookings() {
        $allProducts = Booking::get()->where('client', Auth::user()->id);
        $products = $allProducts;
        foreach ($products as $key => $val) {
            $service_name = Service::where(['id' => $val->service])->first();
            $service_fee = Charge::where(['id' => $val->charge])->first();
            $service_status = Status::where(['id' => $val->status])->first();
            $products[$key]->service_name = $service_name->s_name;
            $products[$key]->service_fee = $service_fee->total;
            $products[$key]->service_status = $service_status->name;
        }
        return view('client.booking.view_bookings')->with(compact('products'));
    }

    public function pay(Request $request, $id = null) {
        if ($request->isMethod('post')) {
            
        } else {
            $settings = Setting::where(['is_current' => 1])->get();
            return view('client.payment.make_payment')->with(compact('settings'));
        }
    }

    public function deleteBooking($id = null) {
        //Only authenticated users can make calls to this function
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Booking::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_message_success', 'Deleted Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function viewPaymets() {
        
    }

    public function viewInvoices() {
        $products = DB::table('bookings')
                ->join('services', 'bookings.service', '=', 'services.id')
                ->join('charges', 'bookings.charge', '=', 'charges.id')
                ->join('statuses', 'bookings.status', '=', 'statuses.id')
                ->select('bookings.*', 'services.s_name', 'services.description', 'statuses.name', 'charges.amount', 'charges.tax', 'charges.total')
                ->get()
                ->where('client', Auth::user()->id);
        $company_settings = Company::get()->first();
        return view('client.payment.invoices')->with(compact('products', 'company_settings'));
    }

    public function pdfview(Request $request) {
        $allProducts = Booking::get()->where('client', Auth::user()->id);
        $products = json_decode(json_encode($allProducts));
        foreach ($products as $key => $val) {
            $service_name = Service::where(['id' => $val->service])->first;
            $service_fee = Charge::where(['id' => $val->charge])->first();
            $service_status = Status::where(['id' => $val->status])->first();
            $products[$key]->service_name = $service_name->name;
            $products[$key]->service_fee = $service_fee->total;
            $products[$key]->service_status = $service_status->name;
        }

        view()->share('products', $products);

        if ($request->has('download')) {

            $pdf = PDF::loadView('client.booking.pdfview');

            return $pdf->download('pdfview.pdf');
        }

        return view('client.bookingpdfview');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login')->with('flash_message_success', 'Logged out Successfully');
    }

}
