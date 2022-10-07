<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TestRemembermeController extends Controller
{
    public function registerform()
    {
       
        return redirect()->route('login', ['#accordion-register']);
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'repassword' => 'required|min:6',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
        ]);
        if($request->password == $request->repassword){
            
            $usersignup = new User;
            $usersignup->name = $request->name;
            $usersignup->email = $request->email;
            $usersignup->password = Hash::make($request->password);
            $usersignup->phone = $request->phone;
            $usersignup->address = $request->address;
            $usersignup->save();
            return redirect('/');

        }else{
            return redirect('/')->with('pwderror', '帳密錯誤!');;

        }
        

    }

    public function loginform()
    {
        
        return view('front_end.register.register');
    }

    public function checklogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',

        ]);

        if ($request->rememberme === null) {
            setcookie('login_email', $request->email, 100);
            setcookie('login_pass', $request->password, 100);
        } else {
            setcookie('login_email', $request->email, time() + 60 * 60 * 24 * 100);
            setcookie('login_pass', $request->password, time() + 60 * 60 * 24 * 100);

        }
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            Session::put('user_session', $input['email']);
            return redirect('/');
        } else {
            dd('登入失敗!');
        }
    }

    public function dashboard()
    {
        return view('rememberme.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('user_session');
        return redirect('/');
    }
}
