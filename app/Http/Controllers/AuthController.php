<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        $role = Role::where("id", ">", 6)->get();
        return view("auth.register", compact("role"));
    }

    public function changePassword(){
        return view("auth.change_password");
    }

    public function loginProcess(Request $request){
        $attempt = Auth::attempt([
            "username" => $request->username,
            "password" => $request->password,
            "is_active" => 1,
        ]);
        if($attempt){
            $request->session()->regenerate();
            return redirect()->intended();
        }
        else {
            return redirect("login")->with("error", "Username / password wrong.");
        }
    }

    public function registerProcess(Request $request){
        $password = bcrypt($request->password);
        $request->request->add(["password" => $password]);
        User::create($request->all());
        return redirect()->route("login");
    }

    public function changePasswordProcess(Request $request){
        if($request->password == $request->password2){
            User::whereId(Auth()->user()->id)->update(["password" => bcrypt($request->password)]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect("login");
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }

    public function selectDate(){
        return view("auth.select_date");
    }

    public function selectDateProcess(Request $request){
        $time_start = $request->date." 05:00";
        $time_end = date("Y-m-d H:i", strtotime($time_start . "+1 day"));
        $time_yesterday = date("Y-m-d H:i", strtotime($time_start . "-1 day"));
        $time_siang = date("Y-m-d H:i", strtotime($time_start . "+8 hours"));
        $time_malam = date("Y-m-d H:i", strtotime($time_siang . "+8 hours"));
        $time_tomorrow = date("Y-m-d H:i", strtotime($time_malam . "+8 hours"));
        $request->session()->put("date", $request->date);
        $request->session()->put("time_start", $time_start);
        $request->session()->put("time_end", $time_end);
        $request->session()->put("time_yesterday", $time_yesterday);
        $request->session()->put("time_siang", $time_siang);
        $request->session()->put("time_malam", $time_malam);
        $request->session()->put("time_tomorrow", $time_tomorrow);
        $request->session()->forget('url_requested');
        return redirect()->to($request->url);
    }
}
