<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login.login');
    }

    public function showProfile()
    {
        $adminData = Auth::guard('admin')->user();
        return view('admin.login.admin_profile_view',compact('adminData'));
    }


    public function adminProfileStore(Request $request): RedirectResponse {
        $adminData = Auth::guard('admin')->user();

        $adminData->name = $request->name;
        $adminData->username = $request->username;
        $adminData->email = $request->email;
        $adminData->phone = $request->phone;
        $adminData->address = $request->address;

        $oldImagePath = $adminData->photo;

        if($request->hasFile("photo")) {
            if (!is_null($oldImagePath)) {
                $oldImagePath = public_path("upload/admin_upload") . '/' . $oldImagePath;
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
            $file = $request->file("photo");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("upload/admin_upload"), $imageName);
            $adminData->photo = $imageName;
        }
        $adminData->save();

        return redirect()->back();
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
