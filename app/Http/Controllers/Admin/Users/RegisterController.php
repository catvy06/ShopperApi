<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.users.register', [
            'title' => 'Đăng ký'
        ]);
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        // return redirect('admin/home')->withSuccess('have signed-in');
        return redirect()->route('admin')->withSuccess('have signed-in');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }
   
        return redirect("admin.users.login")->withSuccess('are not allowed to access');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        // return Redirect('admin.users.login');
        return redirect()->route('login');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
