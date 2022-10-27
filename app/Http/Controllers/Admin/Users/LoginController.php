<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view('admin.users.login', [
            'title' => 'Đăng nhập'
        ]);
    }
    public function store(Request $request) {
        // dd($request->input());
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email,
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
    
}
