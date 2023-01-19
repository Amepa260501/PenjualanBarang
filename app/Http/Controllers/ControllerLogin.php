<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\dbmodel;
use App\Models\modellogin;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerLogin extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login() {
        Auth::logout();
        return view('viewlogin');
    }

    public function actionlogin(Request $r) {
        $data1 = [
            'email' => $r->input('email'),
            'password' => $r->input('password'),
            'role' => 'admin'
        ];
        $data2 = [
            'email' => $r->input('email'),
            'password' => $r->input('password'),
            'role' => 'operator'
        ];
        $data3 = [
            'email' => $r->input('email'),
            'password' => $r->input('password'),
            'role' => 'gudang'
        ];
        if(Auth::attempt($data1)) {
            return redirect('mainview');
        }
        if(Auth::attempt($data2)) {
            return redirect('penjualanview');
        }
        if(Auth::attempt($data3)) {
            return redirect('gudangmain');
        }

        return redirect('login');
    }

    public function logout() {
        Auth::logout();
        return redirect('login')->with('success', 'Succesfully Logged out!');
    }

    public function registrasi() {
        return view('viewregistrasi');
    }

    public function postregistrasi(Request $r) {
        $data = $r->all();
        User::create([
            'name' => $data['name'],
            'alamat' => $data['alamat'],
            'telp' => $data['telp'],
            'jeniskelamin' => $data['jeniskelamin'],
            'role' => 'operator',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('login')->with('success', 'Great, your account is ready to use!');
    } 
}