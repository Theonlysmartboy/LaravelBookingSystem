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
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller {

    public function book(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $product = new Booking;
            $product->client = Auth::user()->name;
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
            $product->save();
            return redirect('/client/view_bookings')->with('flash_message_success', 'Product added Successfully');
        } else {
//Services drop down start
            $services = Service::where(['parent_id' => 0])->get();
            $categories_dropdown = "<option selected disabled>Select<option>";
            foreach ($services as $cat) {
                $categories_dropdown .= "<option class='bg-ready' value='" . $cat->id . "'>" . $cat->name . "<option>";
                $sub_categories = Service::where(['parent_id' => $cat->id])->get();
                foreach ($sub_categories as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->name . "<option>";
                }
            }
//Services dropdown end
            return view('client.booking.add_booking')->with(compact('categories_dropdown'));
        }
    }

//Function to dosplay the bookings
    public function viewBookings() {

        $allProducts = Booking::get()->where('client', Auth::user()->name);
        $products = json_decode(json_encode($allProducts));
        foreach ($products as $key => $val) {
            $service_name = Service::where(['id' => $val->service])->first();
            $service_fee = Charge::where(['id' => $val->charge])->first();
            $service_status = Status::where(['id' => $val->status])->first();
            $products[$key]->service_name = $service_name->name;
            $products[$key]->service_fee = $service_fee->total;
            $products[$key]->service_status = $service_status->name;
        }
        return view('client.booking.view_bookings')->with(compact('products'));
    }

    public function pay(Request $request, $id = null) {
        if ($request->isMethod('post')) {
            
        } else {
            $settings=Setting::where(['is_current' => 1])->get();
            //dd($settings);
            return view('client.payment.make_payment')->with(compact('settings'));;
        }
    }

    public function viewPaymets(){
        
    }
    public function deleteBooking($id = null) {
        if (!empty($id)) {
            $productImage = Product::where(['id' => $id])->first();
//Get product image paths
            $large_image_path = 'images/frontend_images/products/large/';
            $medium_image_path = 'images/frontend_images/products/medium/';
            $small_image_path = 'images/frontend_images/products/small/';
//Delete the large image if exists
            if (file_exists($large_image_path . $productImage->image)) {
                unlink($large_image_path . $productImage->image);
            }
//Delete the medium image if exists
            if (file_exists($medium_image_path . $productImage->image)) {
                unlink($medium_image_path . $productImage->image);
            }
//Delete the small image if exists
            if (file_exists($small_image_path . $productImage->image)) {
                unlink($small_image_path . $productImage->image);
            }
            Product::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_success', 'Product Deleted Successfully');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('/login')->with('flash_message_success', 'Logged out Successfully');
    }

}
