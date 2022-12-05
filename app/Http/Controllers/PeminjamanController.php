<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PeminjamanController extends Controller
{
    public function tabelpeminjaman(){
        $data = Peminjaman::all();
        return view('layouts.table', compact('data'));
    }
    public function tambahpeminjaman(){
        $data = Peminjaman::all();
        return view('layouts.tablelayout.add', compact('data'));
    }
    
}
