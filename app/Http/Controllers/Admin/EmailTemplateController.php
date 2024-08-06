<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    public function index(){
        
    }

    public function create(){
        return view('admin.email-settings.email-templates.create');
    }

    public function store(Request $request){
        try{
        $this->validate($request, ['name'  => 'required', 'subject' => 'required', 
        'title' => 'required', 'description' => 'required', 'from'=>'required']);

        $is_active = (!isset($is_active) || empty($is_active)) ? 0 : 1;

        $emailContent = new EmailTemplate();
        $emailContent->name = $request->name;
        $emailContent->allowed_vars = $request->allowed_vars;
        $emailContent->from = $request->from;
        $emailContent->subject = $request->subject;
        $emailContent->title = $request->title;
        $emailContent->body = $request->description;
        $emailContent->is_active = $is_active;
        $emailContent->save();

        notify()->success('Template Created successfully.');
        return redirect()->back();
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
        notify()->error('Something went wrong');
        return redirect()->back();
    }
        return $request->all();
    }
}
