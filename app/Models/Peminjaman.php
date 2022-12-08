<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'harga_peminjaman',
        'status_peminjaman',
        'denda',
        'status_pembayaran',
        'lama_peminjaman',
        'tanggal_pengembalian',
        'tanggal_peminjaman'

    ];
}
