<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mailsetting;
use Illuminate\Support\Facades\Validator;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class MailSettingController extends Controller
{

   
    public function index()
    {
        $mail= Mailsetting::find(1);
         //notify()->warning('Mail updated !!!');
        return view('admin.setting.mail',['mail'=>$mail]);
    }

    public function update(Request $request, Mailsetting $mailsetting)
    {

        $data = $request->validate([
            'mail_transport'  =>'required',
            'mail_host'       =>'required',
            'mail_port'       =>'required',
            'mail_username'   =>'required',
            'mail_password'   =>'required',
            'mail_encryption' =>'required',
            'mail_from'       =>'required',
        ]);

        $mailsetting->update($data);
         notify()->success('Mail updated !!!');
        return redirect()->back();
    }



    public function testEmail(Request $request)
        {
            $mail = 'webtester.729@gmail.com';
            try {
            Mail::to($mail)->send(new TestEmail());
            echo "Yes";
   
                //return redirect()->back()->withSuccess('Mail updated !!!');
            } catch (\Exception $e) {
                echo $e;
               // return redirect()->back()->withSuccess('Mail updated !!!');
            }
        }

}
