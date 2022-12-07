<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'username_peminjam',
        'nama_peminjam',
        'alamat_peminjam',
        'password',
        'nomor_hp',
        'jenis_kelamin_peminjam',
        'remember_token',
    ];
    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi','id_peminjam');
    }
}
