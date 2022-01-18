<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request){
        //get all input from form
        // dd($request->input());

        //validation
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        //authentication
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if(Auth::attempt([
                'email' => $email, 
                'password' => $password
            ], $remember)){
            return redirect()->route('admin');
        }

        Session::flash('error', 'Đăng nhập thất bại');
        // $request->session()->flash('error', 'Đăng nhập thất bại');

        return redirect()->back();
    }
}