<?php

namespace App\Http\Controllers\Admin\AddressControllers;

use App\Exports\DatabaseExporter;
use App\Http\Controllers\Controller;
use App\Models\AddressType;
use Illuminate\Http\Request;

class AddressesTypeController extends Controller
{
    public function index()
    {
        $addresslist = AddressType::all();
        return view('admin.addresses.addressestype.index', compact('addresslist'));
    }

    public function store(Request $request)
    {
        try {
            $is_active = $request->is_active;
            $address_type = new AddressType();
            $address_type->name = $request->name;
            $address_type->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $address_type->save();

            notify()->success('Address type has been created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the address type.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function info($id)
    {
        try {
            $addresstype = AddressType::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $addresstype,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function edit(Request $request)
    {
        try {

            $request->validate([
                'addressTypeId' => 'required',
                'name' => 'required',
            ]);
            $addressTypeId = $request->addressTypeId;
            $is_active = $request->is_active;
            $is_active = (!isset($is_active) || empty($is_active)) ? 0 : 1;

            if (isset($addressTypeId)) {
                AddressType::where('id', $addressTypeId)->update(['name' => $request->name, 'is_active' => $is_active]);
            }

            notify()->success('Address type has been updated successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the address type.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $data = $request->input('checkedData');
            foreach ($data as $value) {
                AddressType::where('id', $value)->update(['is_active' => 0]);
            }
            notify()->success('Records deleted successfully.');
            return response()->json([
                'status' => 'success',
                'data' => "Records deleted successfully",
            ]);
        } catch (\Exception $e) {
            notify()->error('An error occurred while deleting records.');
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function undo(Request $request)
    {
        try {
            $data = $request->input('checkedData');
            foreach ($data as $value) {
                AddressType::where('id', $value)->update(['is_active' => 1]);
            }
            notify()->success('Records deleted successfully.');
            return response()->json([
                'status' => 'success',
                'data' => "Records deleted successfully",
            ]);
        } catch (\Exception $e) {
            notify()->error('An error occurred while deleting records.');
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function exportdata()
    {
        $data = AddressType::all();

        $exporter = new DatabaseExporter($data);
        return $exporter->export();
    }

}
