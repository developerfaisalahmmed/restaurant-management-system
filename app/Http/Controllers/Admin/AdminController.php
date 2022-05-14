<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Session;

class AdminController extends Controller
{
    public function Admin_Login()
    {
        return view('admin.login');
    }

    public function Admin_login_Check(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', '=', $request->email)->first();
//        return $admin;
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('adminId', $admin->id);
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password not match ');
            }
        } else {
            return redirect()->back()->with('error', 'oh sorry we not found any ' . $request->email . 'in our database');
        }
    }


    public function Admin_Dashboard()
    {
        if (Session::has('adminId')) {
            $admin = Admin::where('id', '=', Session::get('adminId'))->first();
            return view('backend.dashboard.dashboard', compact('admin'));
        } else {
            return redirect()->back();

        }
    }

    public function logout()
    {
        if (Session::has('adminId')) {
            Session::pull('adminId');
        }
        return redirect('/admin/login');
    }

    public function Admins()
    {
        $admins = Admin::all();
        return view('backend.admins.index', compact('admins'));
    }

    public function Admin_Status($id)
    {
        $admin_status = Admin::findOrFail($id);
        if ($admin_status->status == 1) {
            $admin_status->status = 0;
        } else {
            $admin_status->status = 1;
        }
        $admin_status->save();
        $notification = array(
            'message' => 'Successfully Admin Status Change',
            'alert-type' => 'success'
        );
        return redirect()->route('admins')->withInput()->with($notification);
    }

    public function Admin_Delete($id)
    {
        $admin_delete = Admin::findOrFail($id);
        $admin_delete->delete();
        $notification = array(
            'message' => 'Successfully Admin Delete',
            'alert-type' => 'danger'
        );
        return redirect()->route('admins')->withInput()->with($notification);
    }

    public function Admin_Create()
    {
        return view('backend.admins.create');

    }
    public function Admin_Store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|min:5|max:10',
        ]);


        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->user_name = $request->user_name;
        $admin->role = $request->role;
        $admin->status = 1;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $notification = array(
            'message' => ' New admin store done',
            'alert-type' => 'danger'
        );
        return redirect()->route('admins')->withInput()->with($notification);

    }

    public function Admin_Edit($id)
    {
        $admin_edit = Admin::findOrFail($id);
        return view('backend.admins.edit', compact('admin_edit'));

    }

}
