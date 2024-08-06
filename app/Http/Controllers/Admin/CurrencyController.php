<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Currencies;
use App\Models\PlatformSettings;
use App\Exports\DatabaseExporter;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currencies::all();
        return view('admin.pricing.currencies.index', compact('currencies'));
    }

    public function store(Request $request)
    {
        try {
            $is_active = $request->is_active;
            $currency = new Currencies;
            $currency->name = $request->name;
            $currency->code = $request->code;
            $currency->symbol = $request->symbol;
            $currency->exchange_rate = $request->exchange_rate;
            $currency->country_id = $request->country_id;
            $currency->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $currency->save();

            notify()->success('Currency has been created successfully.');
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
                Currencies::where('id', $value)->update(['is_active' => 0]);
            }
            notify()->success('Records deleted successfully.');
            return response()->json([
                'status' => 'success',
                'data' => "Records deleted successfully"
            ]);
        } catch (\Exception $e) {
            notify()->error('An error occurred while deleting records.');
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function undo(Request $request)
    {
        try {
            $data = $request->input('checkedData');
            foreach ($data as $value) {
                Currencies::where('id', $value)->update(['is_active' => 1]);
            }
            notify()->success('Records updated successfully.');
            return response()->json([
                'status' => 'success',
                'data' => "Records updated successfully"
            ]);
        } catch (\Exception $e) {
            notify()->error('An error occurred while updated records.');
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function exportdata()
    {
        $data = Currencies::all();

        $exporter = new DatabaseExporter($data);
        return $exporter->export();
    }

    public function paymentPercent()
    {
        $amount = PlatformSettings::whereNull('country_id')
            ->where('setting_key', 'advance_amount')
            ->first();
        return view('admin.pricing.price-percent', compact('amount'));
    }

    public function updatePaymentPercent(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ]);
        try {
            PlatformSettings::whereNull('country_id')
                ->where('setting_key', 'advance_amount')
                ->update(['setting_value' => $request->amount]);
            return redirect()->back()->with('success', 'Amount updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
