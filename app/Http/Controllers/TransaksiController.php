<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Admin;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\Laptop;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    public function index(){
        $data = DB::table('transaksi')
            ->join('admin', 'transaksi.id_admin', '=', 'admin.id_admin')
            ->join('laptop', 'transaksi.id_laptop', '=', 'laptop.id_laptop')
            ->join('users', 'transaksi.id_peminjam', '=', 'users.id_peminjam')
            ->join('peminjaman', 'transaksi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
            ->select('*')
            ->get(); 
            
        
        // Transaksi::with('Admin', 'Laptop', 'Peminjam', 'Peminjaman')->get();;
                                    /* Query : SELECT * FROM 'index'
                                                INNER JOIN 'admin'
                                                ON 'id_admin' = 'admin.id_admin'
                                                INNER JOIN 'laptop'
                                                ON 'id_laptop' = 'laptop.id_laptop'
                                                INNER JOIN 'users'
                                                ON 'id_users' = 'users.id_usersp'
                                                INNER JOIN 'peminjaman'
                                                ON 'id_peminjaman' = 'peminjaman.id_peminjaman'
                                                */
        return view('transaksi.index', compact('data'));
    }
    public function add()
    {
        $laptops = DB::table('laptop')    
                    ->select('*')
                    ->get(); ////SELECT * FROM 'laptop';
        $peminjams = DB::table('users')    
                    ->select('*')
                    ->get(); // //SELECT * FROM 'peminjaman';
        $peminjamans = DB::table('peminjaman')    
                    ->select('*')
                    ->get(); //  //SELECT * FROM 'peminjamans';
        $admins = DB::table('admin')    
                    ->select('*')
                    ->get(); //         //SELECT * FROM 'admin';
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
                $peminjaman = DB::table('transaksi')->insert([    
                    'id_laptop' => $request->input('id_laptop'),   
                    'id_admin' => $request->input('id_admin'),
                    'id_peminjaman' => $request->input('id_peminjaman'),
                    'id_peminjam' => $request->input('id_peminjam')
                                                /* INSERT INTO 'transaksi'('id_laptop', 'id_admin', 'id_peminjaman', 'id_peminjam') 
                                                VALUES ($request->input('id_laptop'), $request->input('id_admin'), 
                                                $request->input('id_peminjaman'), $request->input('id_peminjam'))*/
                ]);
            }catch(\Exception $e){
                return $e;
            }
            return redirect()->route('transaksi.index');
        }    
    }
    public function delete(Request $request,$id)
    {
        DB::table('transaksi')->where('id_transaksi',$id)->delete(); //DELETE FROM 'transaksi' WHERE id_transaksi == $id;
        return redirect()->route('transaksi.index');
    }
    public function edit(Request $request,$id)
    {
        $laptops = DB::table('laptop')    
                    ->select('*')
                    ->get(); //SELECT * FROM 'laptop';
        $peminjams = DB::table('users')    
                    ->select('*')
                    ->get(); //SELECT * FROM 'peminjaman';
        $peminjamans = DB::table('peminjaman')    
                    ->select('*')
                    ->get();   //SELECT * FROM 'peminjamans';
        $admins = DB::table('admin')    
                    ->select('*')
                    ->get();         //SELECT * FROM 'admin';
        $data = DB::table('transaksi')->where('id_transaksi',$id)->first(); //SELECT FROM 'peminjaman' WHERE 'id_peminjaman'=$id 
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
            $result = DB::table('transaksi')->where('id_transaksi',$request->input('id_transaksi')); //SELECT * FROM WHERE 'id_transaksi' = $request->input('id_transaksi');
            // dd($request->input('id_transaksi'));
        }catch(\Exception $e){
            return $e;
        }
        return redirect()->route('transaksi.index');
    }
}
