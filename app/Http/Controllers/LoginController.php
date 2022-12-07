<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    
    public function loginuser(Request $request)
    {
        if(Auth::attempt($request->only('username_peminjam','password'))){
            return redirect('/');
        }

        return \redirect('login');
    }

    public function registeruser(Request $request)
    {
        // dd(request()->all());
        Peminjam::create([    
                'username_peminjam' => $request->username_peminjam,
                'nama_peminjam' => $request->nama_peminjam,
                'password' => bcrypt($request->password),
                'alamat_peminjam' => $request->alamat_peminjam,   
                'nomor_hp' => $request->nomor_hp,
                'jenis_kelamin_peminjam' => $request->input('jenis_kelamin_peminjam'),
                'remember_token' => Str::random(60)
            ]);
        return redirect('/login');
    }
}
