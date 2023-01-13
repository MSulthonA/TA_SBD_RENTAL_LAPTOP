<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    
    public function loginuser(Request $request)
    {   //WHERE $request->'username_peminjam'='username_peminjam' && $request->'password' = 'password'
        if(Auth::attempt($request->only('username_peminjam','password'))){ 
            return redirect('/dashboard');
        }

        return \redirect('login');
    }

    public function registeruser(Request $request)
    {
        // dd(request()->all());
        DB::table('users')->insert([    
                    /* INSERT INTO 'users'('username_peminjam', 'nama_peminjam', 'password', 
                      'alamat_peminjam', , 'nomor_hp', 'jenis_kelamin_peminjam', 'remember_token') 
                        VALUES ($request->'username_peminjam', $request->'nama_peminjam', 
                        $request->'password', $request->'alamat_peminjam', $request->'nomor_hp', 
                        $request->'jenis_kelamin_peminjam', $request->'remember_token')*/
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

    public function logout(Request $request)
    {
        dd($request);
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }

}
