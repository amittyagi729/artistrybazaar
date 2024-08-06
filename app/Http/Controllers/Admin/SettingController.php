<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    
    public function systeminfo(){
         
        return view('admin.setting.system');
    }
    
     public function cacheclear(){
         \Illuminate\Support\Facades\Artisan::call('optimize:clear');
         notify()->success('Clear cache !!!');
        return redirect()->back();

    }


    public function companyinfo(Request $request){
        $settings = Setting::where('group', 'companyinfo')->first();
        if($request->method()=='GET')
        { 
            if(isset($settings->val)){
            $data = unserialize($settings->val);
            } else {
              $data =[];
            }
            return view('admin.setting.companyinfo', compact('data'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'address'     => 'required',
                'city'     => 'required',
                'zip'     => 'required',
                'phone'     => 'required',
                'email'     => 'required'
            ]);
            if($request->has('logo')){
                $file= $request->file('logo');
                $filename= rand().date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/assets/images/'), $filename);
            }else{

                 $filename = $request->oldimg;
            }
                $serializearray = ['c_address'=>$request->address,'c_city'=>$request->city,'c_zip'=>$request->zip,'c_phone'=>$request->phone,'c_email'=>$request->email,'c_logo'=>$filename];
            $settings->val = serialize($serializearray);

            $settings->save();
          
           
            notify()->success('Company Information has been updated successfully.');
            return redirect()->back();
        } 
    }


    public function scripts(Request $request){
        $settings = Setting::where('name', 'header_scripts')->first();
        if($request->method()=='GET')
        { 
            
            return view('admin.setting.script_header', compact('settings'));
        }

        if($request->method()=='POST')
        {
           
            $settings->val = $request->header_script;

            $settings->save();
          
           
            notify()->success('Script has been updated successfully.');
            return redirect()->back();
        } 
    }


}
