<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportUser;
use App\Http\Controllers\Controller;
use App\Models\Relationpatients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function lists($type)
    {
        $users = User::role($type)->orderBy('id', 'ASC')->get();
        return view('admin.user.user-management', compact('users', 'type'));

    }
    public function list()
    {

        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.user.list', compact('users'));

    }
    public function relation($id)
    {
        $id = base64_decode($id);
        $relations = Relationpatients::where('user_id', $id)->get();

        return view('admin.user.relation-user', ['relations' => $relations]);

    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $name = $request->old('name');
        $username = $request->old('username');
        $email = $request->old('email');
        $phone = $request->old('phone');
        $password = $request->old('password');

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($request->file('userpic')) {
            $file = $request->file('userpic');
            $filename = rand() . date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/uploads/userpic/'), $filename);
        } else {
            $filename = "";
        }

        $users = new User;
        $users->first_name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->phone = $request->phone;
        $users->image = $filename;
        $users->save();

        $role = $request->role;
        $users->syncRoles($role);

        notify()->success('Admin has been successfully saved.');
        return redirect()->back();
    }

    /*    public function show($id)
    {
    echo $id;
    }*/

    public function edit($id)
    {
        $id = base64_decode($id);
        $user = User::find($id);
        $role = Role::get();
        return view('admin.user.edit', ['roles' => $role, 'users' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone,' . $user->id . ',id',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
        ]);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required',
            ]);
            $validated['password'] = Hash::make($request->password);
        }
        $validated['status'] = $request->status;
        $validated['name'] = $request->name;
        if ($request->file('userpic')) {
            $file = $request->file('userpic');
            $filename = rand() . date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/uploads/userpic/'), $filename);
            $validated['image'] = $filename;
            if (isset($request->oldpic) && !empty($request->oldpic)) {
                $p123 = public_path('/public/assets/uploads/userpic/');
                $path = $p123 . $request->oldpic;
                if (!empty($path)) {
                    unlink($path);
                }
            }

        }

        $user->update($validated);

        notify()->success('User updated !!!');
        return redirect()->back();

    }

    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
