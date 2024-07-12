<?php

namespace App\Http\Controllers;
use App\Models\Customer as CustomerModel;
use App\Models\ContactUs as ContactUsModel;
use App\Models\DeliveryType;
use App\Models\Size;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Good;
use App\Models\ContactReview;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function customerRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_no' => 'required|min:10|:customers,customer_tp',
            'email' => 'required|email|regex:/(.*)\./i|unique:customers,customer_email',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
            'address' => 'required|max:255'
        ]);

        $data = new CustomerModel();
        $data->customer_fname = $request->first_name;
        $data->customer_sname = $request->last_name;
        $data->customer_tp = $request->mobile_no;
        $data->customer_email = $request->email;
        $data->password = Hash::make($request->password);
        $data->address = $request->address;
        $data->save();


        return redirect()->route('flogin')->with('success','Registerd Successfully');

    }

    public function customerContact(Request $request) {
        $customer = Auth::guard('customer')->user();
        $customer_id = $customer->id;

        $request->validate([
            'contact_message'=>'required|max:255',
            'subject'=>'required|max:255'
        ]);

        $contact_data = new ContactUsModel();
        $contact_data->customer_id = $customer_id;
        $contact_data->subject = $request->subject;
        $contact_data->message = $request->contact_message;
        $contact_data->save();

        return redirect()->route('home')->with('success','Sent Successfully');
    }

    public function calculateAmount(Request $request)
    {
        $sizeId = $request->input('size');
        $deliveryId = $request->input('delivery_type');
        $CategoryId = $request->input('category');
        $SubCategoryId = $request->input('sub_category');
        $DropOffDate = $request->input('drop_off_date');
        $DropOffAddress = $request->input('drop_off_address');
        $DeliveryAddress = $request->input('delivery_address');
        $item_name = $request->input('item_name');


        $size = Size::find($sizeId);
        $delivery = DeliveryType::find($deliveryId);
        $category = Category::find($CategoryId);
        $subcategory = SubCategory::find($SubCategoryId);

        $totalAmount = $size->size_amount + $delivery->delivery_amount;

        $request->session()->put('dispatchDetails', [
            'size' => $size,
            'delivery' => $delivery,
            'totalAmount' => $totalAmount,
            'category' => $category,
            'subcategory' => $subcategory,
            'drop_off_date' => $DropOffDate,
            'drop_off_address' => $DropOffAddress,
            'delivery_address' => $DeliveryAddress,
            'item_name' => $item_name,
        ]);




        return redirect()->route('confirmpage');
    }

    public function confirmOrder(Request $request)
    {
        $tracking_last = Good::orderByDesc('id')->first();

        if ($tracking_last) {
            $tracking = $tracking_last->tracking_number;
            $tracking = (int)str_replace('LGE-#0000', '', $tracking) + 1;
        } else {
            $tracking = 1;
        }

        $tracking_no = 'LGE-#0000' . $tracking;


        $dispatchDetails = $request->session()->get('dispatchDetails');


        $customer = Auth::guard('customer')->user();
        $customer_id = $customer->id;

        $data = new Good();
        $data->customer_id = $customer_id;
        $data->category_id = $dispatchDetails['category']->id;
        $data->sub_category_id = $dispatchDetails['subcategory']->id;
        $data->size_id = $dispatchDetails['size']->id;
        $data->delivery_type_id = $dispatchDetails['delivery']->id;
        $data->amount = $dispatchDetails['totalAmount'];
        $data->dropoff_date = $dispatchDetails['drop_off_date'];
        $data->dropoff_address = $dispatchDetails['drop_off_address'];
        $data->delivery_address = $dispatchDetails['delivery_address'];
        $data->good_name = $dispatchDetails['item_name'];
        $data->tracking_number = $tracking_no  ;


        $data->save();


        $request->session()->forget('dispatchDetails');

        return redirect()->route('home');
    }

    public function customerReview(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'comments'=>'required|max:255'
        ]);

        $customer = Auth::guard('customer')->user();
        $customer_id = $customer->id;

        $data = new ContactReview();
        $data->customer_id = $customer_id;
        $data->title = $request->title;
        $data->comments = $request->comments;
        $data->save();


        return redirect()->route('home');
    }


}
