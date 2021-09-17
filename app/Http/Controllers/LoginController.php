<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\pemilih;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
    public function login_admin(Request $request)
    {
        $user = $request->username;
        $password = $request->password;
        
        if(!$request->session()->has('user')){
            $data = User::where('username','=',$user)
            ->where('password','=',$password)
            ->first();
                if($data){
                    switch ($data['role']) {
                        case "KPRM":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        case "BEM":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        case "DPM":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        case "AK":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        case "MJ":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        case "EP":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        case "HIMADI":
                            $request->session()->put('user',$data);
                            $get = $request->session()->get('user'); 
                            return redirect()->route('admin.home');
                            break;
                        default:
                        return redirect('/admin/login')->with('alert','Anda tidak punya akses!');
                    }   
                }else{
                    return redirect('/admin/login')->with('alert','password atau username salah');    
                }
        }else{
            return redirect()->route('admin.home');
        }
    }

    public function logout_admin(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }

    public function login_pemilih(Request $request)
    {
        $user = $request->username;
        $password = $request->password;

        if(!$request->session()->has('pemilih')){
            $data = pemilih::where('nim','=',$user)
            ->first();
            if($data!=null){
                if($data->flag!=1){
                    if(Hash::check($password, $data->password)){
                        $request->session()->put('pemilih',$data);
                        $get = $request->session()->get('pemilih'); 
                        return redirect('/');
                    }else{
                        return redirect('/pemilih/login')->with('alert','password atau username salah');    
                    }   
                }else{
                    return redirect('/pemilih/login')->with('alert','Anda Baru Saja Mendaftar! Tunggulah Minimal 30 Menit sampai di ACC ADMIN');    
                }
            }else{
                return redirect('/pemilih/login')->with('alert','Akun Anda Tidak Terdaftar!');    
            }
        }else{
            return redirect('/');
        }
    }

    public function logout_pemilih(Request $request)
    {
        $request->session()->flush();
        return redirect('/pemilih/login');
    }
}
