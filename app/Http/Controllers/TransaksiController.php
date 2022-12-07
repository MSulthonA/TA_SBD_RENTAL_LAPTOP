<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Admin;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\Laptop;

class TransaksiController extends Controller
{
    public function index(){
        $data = Transaksi::with('Admin', 'Laptop', 'Peminjam', 'Peminjaman')->get();;
        return view('transaksi.index', compact('data'));
    }
    public function add()
    {
        $laptops = Laptop::all();
        $peminjams = Peminjam::all();
        $peminjamans = Peminjaman::all();
        $admins = Admin::all();
        return view('transaksi.add',compact('laptops','peminjams','peminjamans','admins'));
    }
    public function store(Request $request)
    {
        {
            $request->validate([
                'id_laptop' => 'required',   
                'id_admin' => 'required',
                'id_peminjaman' => 'required',
                'id_peminjam' => 'required'
            ]);
            try{
                $peminjaman = Transaksi::create([    
                    'id_laptop' => $request->input('id_laptop'),   
                    'id_admin' => $request->input('id_admin'),
                    'id_peminjaman' => $request->input('id_peminjaman'),
                    'id_peminjam' => $request->input('id_peminjam')
                ]);
            }catch(\Exception $e){
                return $e;
            }
            return redirect()->route('transaksi.index');
        }    
    }
    public function delete(Request $request,$id)
    {
        Transaksi::where('id_transaksi',$id)->delete();
        return redirect()->route('transaksi.index');
    }
    public function edit(Request $request,$id)
    {
        $laptops = Laptop::all();
        $peminjams = Peminjam::all();
        $peminjamans = Peminjaman::all();
        $admins = Admin::all();
        $data = Transaksi::where('id_transaksi',$id)->first();
        return view('transaksi.edit',compact('data','laptops','peminjams','peminjamans','admins'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'id_laptop' => 'required',   
            'id_admin' => 'required',
            'id_peminjaman' => 'required',
            'id_peminjam' => 'required'
        ]);
        try{
            $result = Laptop::where('id_transaksi',$request->input('id_transaksi'));
            // dd($request->input('id_transaksi'));
        }catch(\Exception $e){
            return $e;
        }
        return redirect()->route('transaksi.index');
    }
}
