<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use Illuminate\Support\Facades\DB;

class LaptopController extends Controller
{
    public function index(){
        $data = DB::table('laptop')    
                    ->select('*')
                    ->get(); //Query : SELECT * FROM 'laptop'; kemudian dimasukan didalam array php berupa objek key value
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
            $peminjaman = DB::table('laptop')->insert([    /* INSERT INTO 'laptop'('nama_laptop', 'tipe_laptop', 'merek_laptop', 'harga_laptop') 
                                                VALUES ($request->input('nama_laptof'), $request->input('tipe_laptop'), 
                                                $request->input('merek_laptop'), $request->input('harga_laptop'))*/
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
    public function delete(Request $request, $id)
    {
        $laptopSpesific = DB::table('laptop')->where('id_laptop',$id)->delete();//DELETE FROM 'laptop' WHERE id_laptop == $id;
        return redirect()->route('laptop.index');
    }

    public function edit(Request $request,$id)
    {
        $data = DB::table('laptop')->where('id_laptop',$id)->first(); //SELECT FROM 'laptop' WHERE 'id_laptop'=$id 
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
            $result = DB::table('laptop')
                ->where('id_laptop',$request->input('id_laptop')) 
                ->update([    
                'nama_laptop' => $request->input('nama_laptop'),   
                'tipe_laptop' => $request->input('tipe_laptop'),
                'merek_laptop' => $request->input('merek_laptop'),
                'harga_laptop' => $request->input('harga_laptop') /* UPDATE 'laptop'
                                                                     SET 'nama_laptop'= $request->input('nama_laptop'),
                                                                     'tipe_laptop' = $request->input('tipe_laptop'), 
                                                                     'merek_laptop' = $request->input('merek_laptop'),
                                                                     'harga_laptop' = $request->input('harga_laptop')
                                                                     WHERE 'id_laptop'= $request->input('id_laptop')
                                                                                        */
            ]);
        }catch(\Exception $e){
            return $e;
        }
        return redirect()->route('laptop.index', ['id' =>$request->input('id_laptop')]);
    }
}
