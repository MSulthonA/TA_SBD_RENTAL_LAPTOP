<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeminjamanController extends Controller
{
    public function index(){
        $data = Peminjaman::all();
        return view('peminjaman.index', compact('data'));
    }
    public function add()
    {
        return view('peminjaman.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'harga_peminjaman' => 'required',   
            'denda' => 'required',
            'lama_peminjaman' => 'required',
            'status_peminjaman' => 'required',
            'status_pembayaran' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);
        try{
            $peminjaman = Peminjaman::create([    
                'harga_peminjaman' => $request->input('harga_peminjaman'),   
                'denda' => $request->input('denda'),
                'status_peminjaman' => $request->input('status_peminjaman'),
                'status_pembayaran' => $request->input('status_pembayaran'),
                'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
                'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
                'lama_peminjaman'=> $request->input('lama_peminjaman'),
            ]);
        }catch(\Exception $e){
            return $e;
        }
        return redirect()->route('peminjaman.index');
    }
    public function delete(Request $request,$id)
    {
        $peminjamanSpesific = Peminjaman::where('id_peminjaman',$id)->delete();
        return redirect()->route('peminjaman.index');
    }
    public function edit(Request $request,$id)
    {
        $data = Peminjaman::where('id_peminjaman',$id)->first();
        return view('peminjaman.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'harga_peminjaman' => 'required',   
            'denda' => 'required',
            'status_peminjaman' => 'required',
            'status_pembayaran' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);
        try{
            $result = Peminjaman::where('id_peminjaman',$request->input('id_peminjaman'))
                ->update([    
                'harga_peminjaman' => $request->input('harga_peminjaman'),   
                'denda' => $request->input('denda'),
                'status_peminjaman' => $request->input('status_peminjaman'),
                'status_pembayaran' => $request->input('status_pembayaran'),
                'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
                'tanggal_pengembalian' => $request->input('tanggal_pengembalian')
            ]);
        }catch(\Exception $e){
            return ;
        }
        return redirect()->route('peminjaman.index', ['id' =>$request->input('id_peminjaman')]);
    }
}
