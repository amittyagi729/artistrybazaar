<?php

namespace App\Http\Controllers\Admin\AddressControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddressType;
use App\Models\AddressList;
use App\Models\Countries;
use App\Models\States;

class AddressesListController extends Controller
{
    public function index(){
        $addresses = AddressList::all();
        return view('admin.addresses.addresseslist.index',compact('addresses'));
    }

    public function create(){
        $users = User::all();
        $countries = Countries::all();
        $states = States::all();
        $addresslist = AddressType::all();
        return view('admin.addresses.addresseslist.create',['users' => $users,
         'countries'=>$countries, 'states'=>$states,
         'addresslist' => $addresslist]);
    }

    public function store(Request $request){
        try{
            $is_active = $request->is_active;
            $is_default = $request->is_default;
            $address = new AddressList();
            $address->user_id =  $request->user_id;
            $address->street_number = $request->street_number;
            $address->address_line1 = $request->address_line1;
            $address->address_line2 = $request->address_line2;
            $address->city_id = $request->city_id;
            $address->state_id = $request->state_id;
            $address->zip_code = $request->zip_code;
            $address->country_id = $request->country_id;
            $address->address_type = $request->address_type;
            $address->is_default = isset($is_default) && !empty($is_default) ? 1 : 0;
            $address->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $address->save();
            notify()->success('Address Added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('Something went wrong');
            return redirect()->back();
        }

    }
}