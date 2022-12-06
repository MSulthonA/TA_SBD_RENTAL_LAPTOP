<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class LaptopController extends Controller
{
    public function index(){
        $data = Laptop::all();
        return view('laptop.index', compact('data'));
    }
    public function add()
    {
        return view('laptop.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_laptop' => 'required',   
            'tipe_laptop' => 'required',
            'merek_laptop' => 'required',
            'harga_laptop' => 'required'
        ]);
        try{
            $peminjaman = Laptop::create([    
                'nama_laptop' => $request->input('nama_laptop'),   
                'tipe_laptop' => $request->input('tipe_laptop'),
                'merek_laptop' => $request->input('merek_laptop'),
                'harga_laptop' => $request->input('harga_laptop')
            ]);
        }catch(\Exception $e){
            return $e;
        }
        return redirect()->route('laptop.index');
    }
    public function delete(Request $request,$id)
    {
        $laptopSpesific = Laptop::where('id_laptop',$id)->delete();
        return redirect()->route('laptop.index');
    }
    public function edit(Request $request,$id)
    {
        $data = Laptop::where('id_laptop',$id)->first();
        return view('laptop.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_laptop' => 'required',   
            'tipe_laptop' => 'required',
            'merek_laptop' => 'required',
            'harga_laptop' => 'required'
        ]);
        try{
            $result = Laptop::where('id_laptop',$request->input('id_laptop'))
                ->update([    
                'nama_laptop' => $request->input('nama_laptop'),   
                'tipe_laptop' => $request->input('tipe_laptop'),
                'merek_laptop' => $request->input('merek_laptop'),
                'harga_laptop' => $request->input('harga_laptop')
            ]);
        }catch(\Exception $e){
            return $e;
        }
        return redirect()->route('laptop.index', ['id' =>$request->input('id_laptop')]);
    }
}
